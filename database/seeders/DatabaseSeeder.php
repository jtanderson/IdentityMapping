<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        SurveyQuestionSeeder::class,
        CategorySeeder::class,
        UserSeeder::class,
        SurveyPageSeeder::class,
        TextContentSeeder::class,
        ExperienceSurveyQuestionSeeder::class,
        HarmonyQuestionIntersectionSeeder::class,
      ]);
    }
}
