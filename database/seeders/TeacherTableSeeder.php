<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Miftar',
            'lastname' => 'Gashi',
            'username' => 'miftarg',
            'personal_id' => '1234567',
            'date_of_birth' => '1999-07-15',
            'gender' => 'M',
            'phone_number' => '003831111112',
            'email' => 'miftar@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'active'
    ]);
    }
}
