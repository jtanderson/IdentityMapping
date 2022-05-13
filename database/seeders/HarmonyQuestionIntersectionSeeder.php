<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarmonyQuestionIntersectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('harmonyquestionintersection')->insert(
            [
                [
                    'text' => "",
                    'extreme_left' => "My experience of these two overlapping social identities is that they are two distinct identities that happen to intersect",
                    'extreme_right' => "My experience of these two overlapping social identities is that they are really merged together into one distinct identity that is composed of two equal identities",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My experience of these two social identities is that they have a very harmful or conflictual effect on the other",
                    'extreme_right' => "My experience of these two social identities is that they have a very facilitative or helpful effect on the other",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My experience of these two social identities is that one always takes up so much time and energy that it makes it hard to fulfill the expectations of my other identity",
                    'extreme_right' => "My experience of these two social identities is that one always frees up time and energy for me to fulfill the expectations of my other identity",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My experience of these two social identities is that they always elicit conflicting emotions or tensions in me",
                    'extreme_right' => "My experience of these two social identities is that they always elicit compatible/harmonious emotions in me",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My experience of these two social identities is that I feel they easily co-exist in me",
                    'extreme_right' => "My experience of these two social identities is that I feel a struggle managing their co-existence in me",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My intersecting identities lead me to experience hardships or disadvantages in my social world",
                    'extreme_right' => "My intersecting identities provide me with advantages in my social world",
                    'degrees' => '5',
                    'active' => true,
                ],
                [
                    'text' => "",
                    'extreme_left' => "My intersecting identities lead me to experience inequalities or oppression in my social world",
                    'extreme_right' => "My intersecting identities provide me with privileges in my social world",
                    'degrees' => '5',
                    'active' => true,
                ],

            ]);
    }
}