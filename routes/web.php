<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValueController;
use App\Http\Middleware\CheckValue;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\TestMiddleware;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $post = Post::query()->withTrashed()->find(1);
    if ($post->trashed()) {
        $post->restore();
    };

    $post->forceDelete();

//    $array = [
//        'title' => 'title4',
//        'text' => 'text4',
//        'bool' => 1,
//        'published_at' => now(),
//    ];
//    Post::create($array);
//
//    $post = Post::query()->updateOrCreate(
//        ['title' => 'Пост 4', 'text' => 'Текст поста 4'],
//        ['published_at' => now()],
//    );
//
//    $post->text = 'new текст';
//    dump($post->getOriginal('text'));


//    $post_title = 'Пост 3';
//    $post = Post::firstOrNew(
//        [
//            'title' => $post_title,
//            'text' => 'Текст поста 1',
//            'bool' => '1',
//        ]
//    );
//    $post->save();
//    dump($post);
//
//    $post = Post::query()->firstOrCreate(
//        ['title' => $post_title, 'bool' => 1],
//        ['text' => 'Новый текст']
//    );
//    $post->isDirty('text');
//    $post->isClean();
//
//    $active_users_count = User::query()
//        ->where('is_active', true)
//        ->count();



//    User::query()->where('is_active', false)->firstOr(function (){
//        dump('Все пользователи активны');
//    });
//
//    User::query()->findOr($id, function (){
//        dump('Пользователь с id 1 не найден');
//    });

//    $users = User::query()->with('posts')->get();
//    return view('home', ['users' => $users]);

//    $email1 = DB::table('users')->select('email')->where('id', 1)->first(); //stdObject
//    $email2 = User::query()->select('email')->where('id', 1)->first();
//    $email3 = User::query()->where('id', 1)->value('email');
//    dump($email1);
//    dump($email2);
//    dump($email3);
//
//    $emails1 = User::query()->pluck('email');
//    dump($emails1);
//
//    User::query()->chunk(1000, function (Collection $collection) {
//        foreach ($collection as $item) {
//            //Отправить сообщение
//        }
//    });
//
//    User::query()->where('is_active', true)->chunkById(1000, function (Collection $collection) {
//        foreach ($collection as $item) {
//            $item->is_active = false;
//        }
//    }, 'created_at');
//
//    User::query()->lazy(100)->each(function ($user) {
//
//    });

//    Auth::login($user);
//    \Illuminate\Support\Facades\Session::put('status', 'active');
//
//    return view('index', [
//        'user' => $user,
//        'jobs' => [
//            'Задача 1',
//            'Задача 2',
//            'Задача 3',
//        ],
//    ]);
});

Route::get('/contact', function () {
    return view('pages.contact.index');
});

//Route::get('/', [IndexController::class, 'index'])
//    ->name('home')
//    ->middleware(EnsureTokenIsValid::class);

Route::prefix('user')
    ->group(function () {
        Route::middleware(CheckValue::class)->group(function () {
            Route::get('/{value}', ValueController::class)
                ->name('info.value')
                ->whereNumber('value');
            Route::get('/{test}', TestController::class)
                ->name('test')
                ->whereAlpha('test')
                ->middleware(TestMiddleware::class);
        });
        Route::get('/', [UserController::class, 'update'])
            ->name('user.update');
        Route::get('/id/{id}', [UserController::class, 'show'])
            ->name('user.show');
    });

//Route::resource('users', UserController::class)
//    ->missing(function () {
//        dd('Элемент не найден');
//    });

Route::resource('users', UserController::class);
Route::resource('admin', UserController::class);

//Route::get('/info', [InfoController::class, 'index']);
//Route::post('/info', [InfoController::class, 'index']);
//Route::put('/info', [InfoController::class, 'index']);
//Route::patch('/info', [InfoController::class, 'index']);
//Route::delete('/info', [InfoController::class, 'index']);
//Route::options('/info', [InfoController::class, 'index']);
//
//Route::match(['get', 'post'], '/info', function (){
//    dd('info');
//});

//Route::redirect('/user', '/owner'); //302
//Route::Permanentredirect('/user', '/owner'); //301
