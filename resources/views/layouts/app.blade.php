<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('public/storage/default/favicon.ico') }}" type="image/x-icon">

    <style>

        /* Стили для всей страницы */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

        }

        .scroll-container {
            width: calc(100% - 40px); /* Ширина контейнера минус отступы справа и слева */
            margin: 0 auto; /* Центрируем контейнер */
            overflow-y: scroll; /* Включаем вертикальную прокрутку */
            height: 100vh; /* Высота контейнера */
        }

        /* Стилизация полосы прокрутки */
        ::-webkit-scrollbar {
            width: 12px; /* Ширина полосы прокрутки */
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgba(136, 136, 136, 0.7); /* Цвет ползунка прокрутки с прозрачностью */
            border-radius: 6px; /* Скругление углов ползунка прокрутки */
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(136, 136, 136, 0.9); /* Цвет ползунка прокрутки при наведении с прозрачностью */
        }

        ::-webkit-scrollbar-track {
            background-color: transparent; /* Прозрачный фон полосы прокрутки */
        }

        .content {
            padding: 20px; /* Внутренний отступ для контента */
        }
    </style>
</head>
<body>
    <div id="app">
        @include('hud.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('.message/message')

</body>
</html>
