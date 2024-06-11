<?php

namespace UxmalTech\{{ packageName }}\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use UxmalTech\{{ packageName }}\Database\Factories\ExampleFactory;

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected static function newFactory()
    {
        return ExampleFactory::new();
    }
}
