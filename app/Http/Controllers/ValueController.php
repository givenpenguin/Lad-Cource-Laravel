<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function __invoke(Request $request, int $value)
    {
        echo "Value: $value";
        return view('welcome');
    }
}
