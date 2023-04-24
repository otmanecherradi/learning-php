<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('branches')->insert([
      ['name' => 'Industrial Automation'],
      ['name' => 'E-Commerce and Digital Business Transformation'],
      ['name' => 'Computer Engineering'],
      ['name' => 'Industrial Systems Engineering'],
      ['name' => 'Installation and Maintenance of Telecommunication Equipment'],
      ['name' => 'Logistics'],
      ['name' => 'Maintenance of Mechatronic Systems'],
      ['name' => 'Quality Management and Industrial Risk Management'],
      ['name' => 'Industrial Management'],
      ['name' => 'Networks and Systems'],
      ['name' => 'Industrial Technologies and Simulation'],
    ]);
  }
}
