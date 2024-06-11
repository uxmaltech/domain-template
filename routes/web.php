<?php

use Illuminate\Support\Facades\Route;
use UxmalTech\{{ packageName }}\Http\Controllers\ExampleController;

Route::get('/example-route', [ExampleController::class, 'index']);
