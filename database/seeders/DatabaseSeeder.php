<?php

namespace UxmalTech\{{ packageName }}\Database\Seeders;

use Illuminate\Database\Seeder;
use UxmalTech\{{ packageName }}\Models\Example;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Example::factory(10)->create();
    }
}
