<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpatialHabitQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spatial_habits_question')->insert(
            [
                [
                    'text' => "When I am thinking about a complex idea, I use diagrams, maps, and/or graphics to help me understand",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "It is difficult for me to construct diagrams or maps to communicate or analyze a problem",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "When a problem is given in written or verbal form, I try to transform it into visual or graphic representation",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "When I assemble something such as furniture, a bicycle, or a computer, written instructions are more helpful to me than pictorial instructions",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "I find graphs, charts, or maps help me learn new concepts",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "It is helpful for me to visualize physical phenomena such as hurricanes or weather fronts to understand them",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "I like to support my arguments/presentations using maps and diagrams",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "I like to study data or information with the help of graphics such as charts or diagrams",
                    'extreme_left' => "Strongly Disagree",
                    'extreme_right' => "Strongly Agree",
                    'degrees' => '7',
                    'active' => true,
                ],
            ]
            );
    }
}
