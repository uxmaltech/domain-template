<?php

namespace Tests;

use UxmalTech\{{ packageName }}\Database\Seeders\DatabaseSeeder;
use UxmalTech\{{ packageName }}\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->seed(DatabaseSeeder::class);
    }
}
