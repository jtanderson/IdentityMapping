<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExperienceSurveyQuestionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('experiencesurveyquestion')->insert(
      [
        [ 
          'text' => "The mapping tool was easy to use",
          'extreme_left' => "Strongly agree",
          'extreme_right' => "Strongly disagree",
          'degrees' => '5',
          'active' => true,
        ],
        [ 
            'text' => "I had a hard time making a map with the mapping tool",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "The instructions for making the map were hard to understand",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "I had difficulty manipulating the size or location of my circles",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "The mapping tool was a fun experience",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "I enjoyed usinng the mapping tool",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Making my map allowed me to reflect on my social identities in a new way",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "I see my social identities differently after having used the mapping tool",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Thinking about how my social identities intersect made me feel good about myself",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "I feel as though the mapping process strengthened my sense of who I am",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Seeing how my social identities interconnect made me disappointed",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Thinking about how my social identities overlap was distressing",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Would you have understood the instructions without the map images?",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "How necessary was it to have the map images to do the task?",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Overall, using the mapping tool was a good experience",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "You would recommend this survey to a friend",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "Would you have understood the instructions without the map images?",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
          [ 
            'text' => "How necessary was it to have the map images to do the task?",
            'extreme_left' => "Strongly agree",
            'extreme_right' => "Strongly disagree",
            'degrees' => '5',
            'active' => true,
          ],
      ]);
  }
}
