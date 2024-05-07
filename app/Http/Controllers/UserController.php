<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dump($request->all());
//        dump($request->collect()->all());

//        dump($request->input('age', '52'));
//        dump($request->input('name'));
//        dump($request->input('user'));
//        dump($request->input('user.*.name'));

//        dump($request->string('user.name')->upper());
//        dump($request->boolean('user.active'));
//        dump($request->date('user.birthday'));

//        dump($request->only(['name', 'age']));
//        dump($request->has('name'));
//        dump($request->hasAny(['name', 'qwe']));
//
//        dump($request->whenHas('name', function ($value) {
//
//        }));
//
//        if ($request->has('name')) {
//
//        }


//        if($request->hasFile('image')) {
//            dump($request->file('image'));
//        }

//        if($request->file('image')->isValid()) {
//            dump($request->file('image')->path());
//            dump($request->file('image')->extension());
//            dump($request->file('image')->store('images'));
//            dump(url($request->file('image')));
//        }


//        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'age' => ['bail', 'nullable', 'numeric', 'min_digits:1', 'max_digits:3'],
//            'email' => ['required', 'email:rfc,dns', 'unique:users'],
//            'image' => ['required', 'file', 'mimes:jpeg,jpg,png,gif,webp'],
//        ],
//        [
//            'name.required' => 'Поле name обязательное',
//            'name.string' => 'Поле name должно быть строкой',
//        ]);
//        dump($request->validated());

//        $validated = Validator::make(
//            $request->all(),
//            [
//                'name' => ['required', 'string', 'max:255'],
//                'age' => ['bail', 'nullable', 'numeric', 'min_digits:1', 'max_digits:3'],
//                'email' => ['required', 'email:rfc,dns', 'unique:users'],
//                'image' => ['required', 'file', 'mimes:jpeg,jpg,png,gif,webp'],
//
//                'gender' => ['in:male,female'],
//                'pregnant' => ['present_if:gender,female'],
//            ]
//        )->validated();
//        dd($validated);

//        if($validator->fails()) {
//            return response()->json($validator->errors(), 400);
//        };

        $user = User::all()->select('id', 'email', 'name');
//        return response($user, 200)->header('Content-Type', 'application/json');
//        return response('Unauthorized.', 401);

//        if (true) {
//            Cookie::queue('CustomCookie', 'value', 5);
////            Cookie::expire('CustomCookie');
//        }
//
//        return response($user, 200)
//            ->cookie('Bearer', 'value', 5);

        return redirect()->away('');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

    }

    public static function middleware(): array
    {
        return [
            CheckRole::class,
        ];
    }
}
