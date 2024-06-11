<?php

describe('architecture enforcement', function () {
    arch('not debugging statements are left in our code.')
        ->expect(['dd', 'dump', 'ray'])
        ->not
        ->toBeUsed();

    arch('controllers are in the Controllers namespace and end with "Controller.php".')
        ->expect('UxmalTech\{{ packageName }}\Http\Controllers')
        ->toHaveSuffix('Controller')
        ->toBeClasses();

    arch('model classes are in the Models namespace and extend Eloquent Model.')
        ->expect('UxmalTech\{{ packageName }}\Models')
        ->toExtend('Illuminate\Database\Eloquent\Model')
        ->toBeClasses();

    arch('model factories are in the database\factories folder and extend the Laravel Factory class.')
        ->expect('UxmalTech\{{ packageName }}\Database\Factories')
        ->toHaveSuffix('Factory')
        ->toExtend('Illuminate\Database\Eloquent\Factories\Factory')
        ->toBeClasses();
});
