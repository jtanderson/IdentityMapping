<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
          'password' => Hash::make('jta'.env('ADMIN_PASSWORD'))
        ],[ 
          'name' => "Tom Tomcho",
          'email' => "tjtomcho@salisbury.edu",
          'password' => Hash::make('tjt'.env('ADMIN_PASSWORD'))
        ],[ 
          'name' => "Dan Harris",
          'email' => "dwharris@salisbury.edu",
          'password' => Hash::make('dwh'.env('ADMIN_PASSWORD'))
        ],
        [
          'name' => "Jacob Duncan",
          'email' => "jduncan5@gulls.salisbury.edu",
          'password' => Hash::make('jwd'.env('ADMIN_PASSWORD'))
        ]
      ]);
    }
}
