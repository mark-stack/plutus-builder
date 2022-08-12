<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Script;

class User extends Authenticatable {
    
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Get the Scripts attached to this User
    public function scripts(){
        return $this->hasMany(Script::class);
    }

    //Check Admin role
    public function isAdmin() {
       return $this->email === env('ADMIN_EMAIL');
    }

    //Check User role
    public function isUser() {
        return $this->email !== env('ADMIN_EMAIL');
    }
}
