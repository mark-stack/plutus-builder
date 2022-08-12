<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('user_id');

            $table->text('section1')->nullable();
            $table->text('section2')->nullable();
            $table->text('section3')->nullable();
            $table->text('section4A')->nullable();
            $table->text('section4B')->nullable();
            $table->text('section5')->nullable();
            $table->text('section6')->nullable();
            $table->text('section7')->nullable();
            $table->text('section8')->nullable();
            $table->text('section9')->nullable();
            $table->text('section10')->nullable();
            $table->text('section11')->nullable();

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scripts');
    }
}
