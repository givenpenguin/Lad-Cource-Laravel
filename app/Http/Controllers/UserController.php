<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request, string $name, string $role, ?int $id = null)
    {
        echo "User $name, have role: $role, and id: $id";
        return view('welcome');
    }
}
