<?php

use UxmalTech\{{ packageName }}\Models\Example;

it('can insert and retrieve a model record from the database"', function () {
    ${{ packageName }} = Example::find(1);

    expect(${{ packageName }}->name)->toBeString();
});
