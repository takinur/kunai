<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>

<body>
    <h1 class=" text-black text-5xl mb-10"> Hello there </h1>
    <div id="app">
        {{-- <front-page> </front-page> --}}
    </div>

    <script src="{{ mix('js/app.js') }}" > </script>
</body>

</html>
