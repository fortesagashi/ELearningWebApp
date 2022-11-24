<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'subject_name' => 'Gjeografi',
            'study_year' => '8',
            'class_identifier' => '2',
            'country' => 'Kosove',
            'school_id' => '1',
            'teacher_id' => '1',

    ]);
    }
}
