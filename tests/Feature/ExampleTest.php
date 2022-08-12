<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Script;

class ExampleTest extends TestCase{

    use RefreshDatabase;

    //Frontend
    public function test_landing_page(){

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Plutus low-code');
        $response->assertDontSee('Ethereum');
    }

    //User pages
    public function test_scripts_page(){

        $user  = factory(User::class)->create(['email' => 'user@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);
        
        $response = $this->actingAs($user)->get('/scripts');
        $response->assertStatus(200);

        //See
        $response->assertSee('Create script');

        //Dont see
        $response->assertDontSee('Plutus low-code');
        $response->assertDontSee('New code block');
    }

    //Admin pages
    public function test_codeblocks_page(){

        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);
        
        $response = $this->actingAs($admin)->get('/admin/codeblocks');
        $response->assertStatus(200);

        //See
        $response->assertSee('New code block');
        $response->assertSee('Template');

        //Dont see
        $response->assertDontSee('Plutus low-code');
    }

    public function test_users_page(){

        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);
        
        $response = $this->actingAs($admin)->get('/admin/users');
        $response->assertStatus(200);

        //See
        $response->assertSee($admin->email);
        $response->assertSee('Name');
        $response->assertSee('Email');

        //Dont see
        $response->assertDontSee('Plutus low-code');
        $response->assertDontSee('New code block');
    }

    //Permissions
    public function test_guest_cannot_access_admin_dashboard(){

        $response = $this->get('/admin/codeblocks');
        $response->assertRedirect('/auth/redirect/google');

        $response = $this->get('/admin/users');
        $response->assertRedirect('/auth/redirect/google');
    }

    public function test_guest_cannot_access_user_dashboard(){

        $response = $this->get('/scripts');
        $response->assertRedirect('/auth/redirect/google');
    }

    public function test_user_cannot_access_admin(){

        $user  = factory(User::class)->create(['email' => 'user@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);
        
        $response = $this->actingAs($user)->get('/admin');
        $response->assertRedirect('/scripts');
    }

    public function test_user_can_view_own_and_template_scripts(){

        $user_1 = factory(User::class)->create(['email' => 'user-1@gmail.com']);
        $admin  = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        $script_by_user_1 = factory(Script::class)->create(['user_id' => $user_1->id]);
        $script_by_admin = factory(Script::class)->create(['user_id' => $admin->id]);

        $response = $this->actingAs($user_1)->get('/scripts/'.$script_by_user_1->id);
        $response->assertStatus(200);

        $response = $this->actingAs($user_1)->get('/scripts/'.$script_by_admin->id);
        $response->assertStatus(200);
    }

    public function test_user_cannot_view_another_users_scripts(){
        
        $user_1 = factory(User::class)->create(['email' => 'user-1@gmail.com']);
        $user_2 = factory(User::class)->create(['email' => 'user-2@gmail.com']);
        $admin  = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        $script_by_user_1 = factory(Script::class)->create(['user_id' => $user_1->id]);
        $script_by_user_2 = factory(Script::class)->create(['user_id' => $user_2->id]);

        $response = $this->actingAs($user_1)->get('/scripts/'.$script_by_user_2->id);
        $response->assertStatus(404);
    }

    public function test_user_cannot_edit_admin_created_scripts(){

        $user  = factory(User::class)->create(['email' => 'user@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        $script_by_admin = factory(Script::class)->create(['user_id' => $admin->id]);

        $response = $this->actingAs($user)->get('/scripts/'.$script_by_admin->id.'/edit');
        $response->assertStatus(404);
    }

    public function test_user_cannot_edit_another_users_scripts(){

        $user_1 = factory(User::class)->create(['email' => 'user-1@gmail.com']);
        $user_2 = factory(User::class)->create(['email' => 'user-2@gmail.com']);
        $admin  = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        $script_by_user_2 = factory(Script::class)->create(['user_id' => $user_2->id]);

        $response = $this->actingAs($user_1)->get('/scripts/'.$script_by_user_2->id.'/edit');
        $response->assertStatus(404);
    }

    //Codeblocks
    public function test_create_codeblock(){

        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        //Access Create page
        $response = $this->actingAs($admin)->get('/admin/codeblocks');
        $response->assertStatus(200);

        //Edit request
        $response = $this->actingAs($admin)->post('admin/codeblocks',[
            'section' => 'something section',
            'title' => 'something title',
            'description' => 'something description',
            'codeblock' => 'something codeblock'
        ]);
        $response->assertRedirect('/admin/codeblocks');

        //Database is updated as intended
        $this->assertDatabaseCount('codeblocks', 1);
    }

    public function test_edit_codeblock(){
    
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        //Access Create page
        $response = $this->actingAs($admin)->get('/admin/codeblocks');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->post('admin/codeblocks',[
            'section' => 'something section',
            'title' => 'something title',
            'description' => 'something description',
            'codeblock' => 'something codeblock'
        ]);
        $response->assertRedirect('/admin/codeblocks');

        //Access Edit page
        $response = $this->actingAs($admin)->get('admin/codeblocks/1/edit');
        $response->assertStatus(200);

        //Edit request
        $response = $this->actingAs($admin)->put('admin/codeblocks/1',[
            'section' => 'something section 2',
            'title' => 'something title 2',
            'description' => 'something description 2',
            'codeblock' => 'something codeblock 2'
        ]);
        $response->assertRedirect('/admin/codeblocks/1/edit');

        //Database is updated as intended
        $this->assertDatabaseHas('codeblocks', [
            'id' => 1,
            'description' => 'something description 2',
        ]);
    }

    public function test_delete_codeblock(){

        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        //Access Create page
        $response = $this->actingAs($admin)->get('/admin/codeblocks');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->post('admin/codeblocks',[
            'section' => 'something section',
            'title' => 'something title',
            'description' => 'something description',
            'codeblock' => 'something codeblock'
        ]);
        $response->assertRedirect('/admin/codeblocks');

        //Delete
        $response = $this->actingAs($admin)->delete('admin/codeblocks/1');
        $response->assertRedirect('/admin/codeblocks');

        //Database is updated as intended
        $this->assertDatabaseCount('codeblocks', 0);
    }


    //Scripts
    public function test_script_create(){

        $user  = factory(User::class)->create(['email' => 'user@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);
        
        //Access create page
        $response = $this->actingAs($user)->get('/scripts');
        $response->assertStatus(200);

        //Create
        $response = $this->actingAs($user)->post('/scripts',[
            'title' => 'something title'
        ]);
        $response->assertRedirect('/scripts/1/edit');

        //Database is updated as intended
        $this->assertDatabaseCount('scripts', 1);
    }

    public function test_script_edit(){

        $user  = factory(User::class)->create(['email' => 'user-1@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        $script_by_user = factory(Script::class)->create(['user_id' => $user->id]);
        
        //Access Edit page
        $response = $this->actingAs($user)->get('/scripts/'.$script_by_user->id.'/edit');
        $response->assertStatus(200);

        //Post (put) request to edit
        $response = $this->actingAs($user)->put('/scripts/'.$script_by_user->id,[
            'description' => 'something description',
            'testing' => 'something testing',
            'section1' => 'something section1',
            'section2' => 'something section2'
        ]);
        $response->assertRedirect('/scripts/'.$script_by_user->id.'/edit');

        //Database is updated as intended
        $this->assertDatabaseHas('scripts', [
            'id' => $script_by_user->id,
            'section1' => 'something section1',
        ]);
    }

    public function test_script_delete(){

        $user  = factory(User::class)->create(['email' => 'user-1@gmail.com']);
        $admin = factory(User::class)->create(['email' => 'mark@cardanocrowd.com']);

        //Access Create page
        $response = $this->actingAs($user)->get('/scripts');
        $response->assertStatus(200);

        //Create
        $response = $this->actingAs($user)->post('/scripts',[
            'title' => 'something title'
        ]);
        $response->assertRedirect('/scripts/1/edit');

        //Back to table
        $response = $this->actingAs($user)->get('/scripts');

        //Delete
        $response = $this->actingAs($user)->delete('scripts/1');
        $response->assertRedirect('/scripts');

        //Database is updated as intended
        $this->assertDatabaseCount('scripts', 0);
    }

    public function test_script_rename(){
        //
    }

    public function test_script_copy(){
        //
    }

}
