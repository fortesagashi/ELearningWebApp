<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(CountryTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        //  \App\Models\User::factory(8)->create();
        //  \App\Models\Student::factory(8)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
