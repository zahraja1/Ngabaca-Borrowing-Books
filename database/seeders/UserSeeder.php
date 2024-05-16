<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class 
UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make("1234"),
                'role'=>1,
            ),
            array(
                'name'=>'customer',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=> Hash::make("1234"),
                'role'=>2,
            ),
           
        ));
    }
}
