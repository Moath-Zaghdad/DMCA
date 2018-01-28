<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->delete();
        
        DB::table('providers')->insert([
        	'name' => 'Youtube',
        	'copyright_email' => 'copyright@Youtube.com',
        	]);
        
        DB::table('providers')->insert([
        	'name' => 'Z-Provider',
        	'copyright_email' => 'copyright@Z.com',
        	]);

    }
}
