<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplateToCodeblocksTable extends Migration{

    public function up(){
        
        Schema::table('codeblocks', function (Blueprint $table) {
            $table->boolean('template')->default(false);
        });
    }


    public function down(){

        Schema::table('codeblocks', function (Blueprint $table) {
            $table->dropColumn('template');
        });
    }
}
