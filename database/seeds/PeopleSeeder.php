<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PeopleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('peoples')->insert([
    			'name' => $faker->name,
    			'address' => $faker->address,
    			'job' => $faker->text,
    			'about' => $faker->text,
    			'contact' => $faker->phoneNumber,
    			'facebook' => $faker->text,
    			'twitter' => $faker->text,
    			'linkedin' => $faker->text,
    			'pictures' => $faker->text,
    		]);
 
    	}
    }
}
