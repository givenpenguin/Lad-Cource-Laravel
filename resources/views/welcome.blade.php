<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div>{{ $message }}</div> @enderror
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div>{{ $message }}</div> @enderror
        <button type="submit">Отправить</button>
    </form>
    </body>
</html>
