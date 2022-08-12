<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Script extends Model {

    protected $table = 'scripts';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    //Get the User this Script belongs to
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Get Codeblocks that are designated as templates
    public function scopeTemplates($query){
        $admin_email = env('ADMIN_EMAIL');
        $admin = User::where('email',$admin_email)->first();
        return $query->where('user_id',$admin->id);
    }

    //Belonging only to this user or admin
    public function scopeYoursOrAdmin($query,$user){
        $admin_email = env('ADMIN_EMAIL');
        $admin = User::where('email',$admin_email)->firstorfail();
        return $query->where('user_id',$admin->id)->orwhere('user_id',$user->id);
    }
}
