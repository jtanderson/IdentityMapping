<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('category')->insert([
        [
          'name' => 'social',
          'active' => true,
        ],
        [
          'name' => 'professional',
          'active' => true,
        ],
        [
          'name' => 'other',
          'active' => true,
        ],
      ]);
    }
}
