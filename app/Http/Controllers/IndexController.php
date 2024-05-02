<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        echo 'index';
        return view('welcome', [
            'isHome' => true,
        ]);
    }
}
