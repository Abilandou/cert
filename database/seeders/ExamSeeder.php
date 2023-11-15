<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(\App\Models\Exam::all()) > 0)
        {
            return;
        }

        $faker = \Faker\Factory::create();



        for($i = 0; $i <= 30; $i++)
        {
            $exam = new \App\Models\Exam();
            $exam->test = $faker->text(20);
            $exam->score = $faker->randomElement([12, 423, 90, 54, 12, 19]);
            $exam->level = $faker->randomElement(['B1', 'C1', 'C2', 'B2']);
            $exam->user_id = \App\Models\User::inRandomOrder()->first()->id;

            $exam->save();

        }
    }
}
