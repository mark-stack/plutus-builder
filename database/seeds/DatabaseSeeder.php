<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Settings
        DB::table('settings')->insert([
            'example1' => '1',
            'example2' => '1'
        ]);

    }
}
