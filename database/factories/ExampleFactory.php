<?php

namespace UxmalTech\{{ packageName }}\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use UxmalTech\{{ packageName }}\Models\Example;

class ExampleFactory extends Factory
{
    protected $model = Example::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
