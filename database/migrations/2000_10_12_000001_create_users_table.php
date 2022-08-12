<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    public function up(){

        Schema::create('users', function (Blueprint $table) {

            $table->timestamps();
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('provider'); 
            $table->string('provider_id'); 
        });
    }

    public function down(){

        Schema::dropIfExists('users');
    }
}