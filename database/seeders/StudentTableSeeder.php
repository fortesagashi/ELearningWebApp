<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'Fatos',
            'lastname' => 'Gashi',
            'username' => 'fatosg',
            'personal_id' => '12345678',
            'student_id' => '23',
            'date_of_birth' => '1999-07-15',
            'gender' => 'F',
            'country' => 'Kosove',
            'parent_phone_number' => '00383111111',
            'school_id' => '1',
            'study_year' => '8',
            'class_identifier' => '1',
            'email' => 'fatos@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'active'
    ]);
    }
}
