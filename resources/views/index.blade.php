@extends('layouts.app')

@section('title', 'Главная страница')

@section('aside')
    @parent
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
@endsection

@section('content')
{{--    @includeIf('header.header')--}}
{{--    @includeFirst(['heade.heade', 'header.header'])--}}
{{--    @includeUnless(false, 'header.header')--}}
    @includeWhen(true, 'header.header', ['title' => 'ШаПкА'])
    <div class="container">
        <div class="row">
            @{{ $name }}
            <div class="col-12">
                <h1>Главная страница</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur deleniti facere, ipsum nesciunt nostrum officia? Aut consequatur ducimus et eum, illum itaque minus nihil, nobis omnis quo rerum saepe sunt?</p>
            </div>

            <h2>
                @editUser
                    Пользователь имеет права на редактирование
                @endeditUser
            </h2>

            @verbatim
                <div id="app">
                    {{ message }}
                    {{ user.email }}
                </div>
            @endverbatim

            @if($user->email === 'lang1.otho@example.com')
                Вы админ
            @elseif($user->email === 'lang.otho@example.com')
                Вы модератор
            @else
                Вы гость
            @endif

            @unless($user->email === '1lang.otho@example.com')
                Вы модератор
            @endunless

            @isset($user->name)
                {{ $user->name }}
            @endisset

            <div>
                @empty($jobs)
                    Задач нет
                @else
                    @foreach($jobs as $job)
                        {{ $job }}
                    @endforeach
                @endempty
            </div>

            @auth
                Вы авторизованы
            @endauth

            @guest
                Вы гость
            @endguest

            <h3>
                @production
                    Сайт в продакшене
                @endproduction
                @env(['local', 'review'])
                    Локальная версия сайта
                @endenv
            </h3>

            @session('status')
                {{ $value }}
            @endsession

            @switch($user->name)
                @case('Prof. Callie Bruen III')
                    Вы админ
                @break
                @default
                    Вы гость
            @endswitch

            @for($i = 0; $i < 10; $i++)

            @endfor

            <div class="mb-3">
                @forelse($jobs as $job)
                    @if($loop->first)
                        <li>Первый элемент</li>
                    @elseif($loop->odd)
                        <li>Нечетный элемент</li>
                    @elseif($loop->even)
                        <li>Четный элемент</li>
                    @endif
                    <li>{{ $loop->index }} {{ $loop->iteration }}</li>
                    <li>{{ $job }}</li>
                @empty
                    Задач нет
                @endforelse
            </div>

            <div class="mb-3">
                @foreach($jobs as $job)
                    <li>{{ $loop->depth }} {{ $job }}</li>
                    @foreach($jobs as $job)
                        <li>{{ $loop->depth }} {{ $loop->parent->index }} {{ $job }}</li>
                    @endforeach
                @endforeach
            </div>

            <div @class(['bg-blue' => true, 'test'])>
                <p>Hello World!</p>

                <input type="checkbox" @checked($user->isActive)>
                <input type="text" @readonly($user->isActive)>
                <input type="text" @required($user->isActive)>
                <button type="button" @disabled($user->isActive)>Кнопка</button>
            </div>

            @each('particles.li', $jobs, 'job')

            @php
                $counter = 1;
                $counter++;
            @endphp
            {{ $counter }}


        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #e4e4e4;
        }
    </style>
@endpush

@push('javascript')
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {
                const message = ref('Hello vue!')
                const user = {{ Js::from($user) }};
                return {
                    message,
                    user
                }
            }
        }).mount('#app')
    </script>
@endpush
