<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Tag::create([
      'name' => 'NodeJS',
      'slug' => 'node-js'
    ]);
    Tag::create([
      'name' => 'ASP.NET',
      'slug' => 'asp-net'
    ]);
    Tag::create([
      'name' => 'PHP',
      'slug' => 'php'
    ]);
    Tag::create([
      'name' => 'Laravel',
      'slug' => 'laravel'
    ]);
  }
}