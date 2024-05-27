<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
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
