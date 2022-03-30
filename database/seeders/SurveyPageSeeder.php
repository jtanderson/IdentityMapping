<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SurveyPageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('surveypage')->insert(
      [
        // [ 
        //   'header' => "Survey Page #1",
        //   'description' => "Description for survey page 1 goes here...",
        //   'active' => true,
        //   'order' => '1',
        // ],
        // [ 
        //     'header' => "Survey Page #2",
        //     'description' => "Description for survey page 2 goes here...",
        //     'active' => true,
        //     'order' => '2',
        //   ],
      ]);
  }
}

