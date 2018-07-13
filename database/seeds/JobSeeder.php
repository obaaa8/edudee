<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            [
                'name' => 'Engineer',
            ],
            [
                'name' => 'Farmer',
            ],
            [
                'name' => 'Teacher',
            ]
        ];

        for($i=0; $i<count($jobs); $i++){
            $jobb = new App\Job();
            $jobb->id = App\Job::count() +1;
            $jobb->name = $jobs[$i]['name'];
            $jobb->amount = rand(100, 1000);
            $jobb->save();
        }
    }
}
