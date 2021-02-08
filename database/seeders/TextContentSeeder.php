<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TextContentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('textcontent')->insert(
      [
        [ 
          // [page]-[location]-[number]
          'key' => "start-top-1",
          'content' => "Discuss the overall project and survey here...",
          'description' => "Appears on the /start page below the banner, before the images.",
        ],
      ]);
  }
}
