<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SelfBeliefConstructSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('self_belief_construct')->insert(
            [
                [
                    'text' => "How meaningful are your religious beliefs to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your group of friends to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your family to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your political affiliation to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your ethnicity to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your cultural heritage to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is/are your work/coworkers to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your undergraduate major to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your gender to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your nationality to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful are your (dis)abilities to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
                [
                    'text' => "How meaningful is your freedom to defining who you are (sense of self)?",
                    'extreme_left' => "Not at all",
                    'extreme_right' => "Very much",
                    'degrees' => '7',
                    'active' => true,
                ],
            ]);
    }
}
