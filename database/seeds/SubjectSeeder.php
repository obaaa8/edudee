<?php

use Illuminate\Database\Seeder;

use App\Subject;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = factory(App\Subject::class, 5)->create();

        $depts = App\Dept::all();
        foreach($depts as $dept){

            $dept->subjects()->save($subjects[rand(1,4)]);
            // foreach($subjects as $subject){
            //     $dept->subjects()->save($subject);
            // }
        }
    }
}
