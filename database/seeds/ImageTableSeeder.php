<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	\DB::table('images')->insert([
    		'user_id' => 1,
    		'name' => 'galaxy',
    		'description' => 'cool',
    		'file_name' => '123.jpeg',
    		'path' => 'i,ages/123.jpeg',
    		'created_at' => NOW(),
        	'updated_at' => NOW()
    	]);

    	\DB::table('images')->insert([
    		'user_id' => 2,
    		'name' => 'galaxy',
    		'description' => 'cool',
    		'file_name' => '123.jpeg',
    		'path' => 'i,ages/123.jpeg',
    		'created_at' => NOW(),
        	'updated_at' => NOW()
    	]);

    	\DB::table('images')->insert([
    		'user_id' => 3,
    		'name' => 'galaxy',
    		'description' => 'cool',
    		'file_name' => '123.jpeg',
    		'path' => 'i,ages/123.jpeg',
    		'created_at' => NOW(),
        	'updated_at' => NOW()
    	]);

    	\DB::table('images')->insert([
    		'user_id' => 2,
    		'name' => 'galaxy',
    		'description' => 'cool',
    		'file_name' => '123.jpeg',
    		'path' => 'i,ages/123.jpeg',
    		'created_at' => NOW(),
        	'updated_at' => NOW()

    	]);
            


    }
}
