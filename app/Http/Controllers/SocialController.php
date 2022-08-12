<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\Models\User;
use Auth;


class SocialController extends Controller{

    public function redirect($social){

        //redirect
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        
        $getInfo = Socialite::driver($social)->stateless()->user();
        
        //Response is array of USER,REDIRECT,FLASH MSG
        $user = $this->createUser($getInfo,$social);

        auth()->login($user);
        
        //User was created
        if($user != null){

            if(Auth::user()->isAdmin()){
                return redirect()->to('/admin');
            }

            if(Auth::user()->isUser()){
                return redirect('/scripts');
            }
        }
        //User not created
        else{
            return redirect('/');
        }
    }


    function createUser($getInfo,$social){
    
        //$user = User::where('provider_id', $getInfo->id)->first();
        $user = User::where('email', $getInfo->email)->first();
        
        if (!$user) {

            $first_name = explode(' ',$getInfo->name)[0];
            $last_name = explode(' ',$getInfo->name)[1];

            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $social,
                'provider_id' => $getInfo->id,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]);
        }

        return $user;
    }
}

