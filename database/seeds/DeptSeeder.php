<?php

use Illuminate\Database\Seeder;
use App\College;
class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = factory(App\Dept::class, 5)->create();

        $colleges = College::all();
        foreach($colleges as $college){
            $college->depts()->save($depts[rand(1,4)]);
            // foreach($depts as $dept){
            //     $college->depts()->save($dept);
            // }
        }
    }
}
