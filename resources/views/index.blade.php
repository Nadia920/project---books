<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{route('authors')}}" style="font-size:20px; color:red; padding:10px;" class="main-menu-item navbar-brand">Авторы</a>
        <a href="{{route('books')}}" style="font-size:20px; color:red; padding:10px;" class="main-menu-item navbar-brand">Книги</a>
        </nav>    
        @yield('content') 
        <script src="/js/bootstrap.js"></script>
        <script src="/js/main.js"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        @include('send')
    </body>
</html>
