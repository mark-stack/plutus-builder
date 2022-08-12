<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeblocksTable extends Migration
{

    public function up()
    {
        Schema::create('codeblocks', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');

            $table->string('section');
            $table->string('title');
            $table->text('description');
            $table->text('codeblock');

        });
    }


    public function down()
    {
        Schema::drop('codeblocks');
    }
}
