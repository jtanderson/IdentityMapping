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
          'extreme_left' => "Very important",
          'extreme_right' => "Very unimportant",
          'degrees' => '5',
          'surveyable_type' => 'participant',
          'active' => true,
        ],
        [ 
          'text' => "When sizing your circles for each identity how did you interpret what the size of the circle you used meant?",
          'extreme_left' => "Smaller more important",
          'extreme_right' => "Bigger more important",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "When determining whether your circles overlapped among your identities how did you interpret what your circle placement meant?",
          'extreme_left' => "Nonoverlap important",
          'extreme_right' => "Overlap important",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Rate how much you think each of your identities is evolving or changing" ,
          'extreme_left' => "Becoming more negative",
          'extreme_right' => "Becoming more positive",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you experience threats or obstacles because of your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel you're not accepted, ostracized, or socially stigmatized because of your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent does your emotional experience with a given identity ripple out like a wave and affect your other identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very much",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel you have to conceal your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel your identities are invisible to others?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel your identities provide you with a sense of community or social support?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel your identities make you feel like you don't fit in with others?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you have the opportunity to express your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel you need to disown or discredit your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent do you feel you can fully embrace or self-accept your identities?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "To what extent to you feel uncertain about being accepted as a group member by those who share your social identity?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very much",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "How often do you think about having each social identity and what you have in common with others who share that identity?" ,
          'extreme_left' => "Not at all",
          'extreme_right' => "Very often",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Indicate the extent to which something that happens in your life is affected by what happens to other people who share that social identity",
          'extreme_left' => "Disagree Strongly",
          'extreme_right' => "Agree Strongly",
          'degrees' => '5',
          'surveyable_type' => 'circle',
          'active' => true,
        ],
        [ 
          'text' => "Was this survey helpful to you?",
          'extreme_left' => "Disagree Strongly",
          'extreme_right' => "Agree Strongly",
          'degrees' => '5',
          'surveyable_type' => 'participant',
          'active' => true,
        ],
      ]);
  }
}
