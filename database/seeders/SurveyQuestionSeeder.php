<?php

namespace Database\Seeders;

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
    DB::table('surveyquestion')->insert(
      [
        [ 
          'text' => "Rate how strongly held each social identity is when you think about yourself.",
          'extreme_left' => "Strongly held",
          'extreme_right' => "Weakly held",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Rate the distance you believe each social identity is from defining who you are.",
          'extreme_left' => "Very close",
          'extreme_right' => "Very far",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Rate how important each social identity is to the way you think about yourself",
          'extreme_left' => "Very important",
          'extreme_right' => "Very unimportant",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "How often do you think about having each social identity and what you have in common with others who share that identity?",
          'extreme_left' => "Very often",
          'extreme_right' => "Very rarely",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Indicate the extent to which something that happens in your life is affected by what happens to other people who share that social identity.",
          'extreme_left' => "A lot",
          'extreme_right' => "Very little",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "How proud do you feel when someone who shares your social identity accomplishes something outstanding?",
          'extreme_left' => "Very proud",
          'extreme_right' => "Not proud",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        // participant survey questions
        [
          'text' => "How easy was this survey to complete?",
          "extreme_left" => "Very easy",
          "extreme_right" => "Very difficult",
          "degrees" => "5",
          "surveyable_type" => "participant",
          'active' => true,
        ],
        [
          'text' => "Did you complete the survey in a timely manner?",
          "extreme_left" => "Able to complete quickly",
          "extreme_right" => "Took a long time to complete",
          "degrees" => "5",
          "surveyable_type" => "participant",
          'active' => true,
        ]
      ]);
  }
}
