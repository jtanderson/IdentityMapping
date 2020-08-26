<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SurveyQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveyquestions')->insert([ 

        	'text' => "",
        	'extreme_left' => "",
        	'extreme_right' => "",

        ]);
    }
}
