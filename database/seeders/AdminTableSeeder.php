<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
                'name' => 'Admin',
                'lastname' => 'Admin',
                'username' => 'admin',
                'personal_id' => '123456',
                'date_of_birth' => '1999-07-15',
                'gender' => 'F',
                'country' => 'Kosove',
                'school_id' => '1',
                'phone_number' => '00383111111',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'status' => 'active'
        ]);
    }
}
