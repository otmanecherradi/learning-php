<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      'name' => Str::random(10),
      'email' => Str::random(10) . '@ensat.ac.ma',
      'password' => Hash::make('password'),
      'is_admin' => true
    ]);
  }
}
