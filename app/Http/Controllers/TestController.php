<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(Request $request, string $name)
    {
        echo "Test name: $name";
        return view('welcome');
    }
}
