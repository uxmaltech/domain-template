<?php

namespace UxmalTech\{{ packageName }}\Http\Controllers;

class ExampleController
{
    public function index()
    {
        return response()->json($this->generateJson());
    }

    public function generateJson()
    {
        return [
            'name' => 'John Doe',
            'email' => 'john.doe@example-mail.com',
        ];
    }
}
