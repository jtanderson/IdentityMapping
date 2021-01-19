<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [ 
          'name' => "Joe Anderson",
          'email' => "jtanderson@salisbury.edu",
          'password' => bcrypt('jta'.env('ADMIN_PASSWORD'))
        ],[ 
          'name' => "Tom Tomcho",
          'email' => "tjtomcho@salisbury.edu",
          'password' => bcrypt('tjt'.env('ADMIN_PASSWORD'))
        ],[ 
          'name' => "Dan Harris",
          'email' => "dwharris@salisbury.edu",
          'password' => bcrypt('dwh'.env('ADMIN_PASSWORD'))
        ],
        [
          'name' => "Jacob Duncan",
          'email' => "jduncan5@gulls.salisbury.edu",
          'password' => bcrypt('jwd'.env('ADMIN_PASSWORD'))
        ]
      ]);
    }
}
