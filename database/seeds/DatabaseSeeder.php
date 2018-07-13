<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CollegeSeeder::class);
        $this->call(DeptSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(JobSeeder::class);
    }
}
