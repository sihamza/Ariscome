<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e929341d1c.js" crossorigin="anonymous"></script>
        <style media="screen">
          .prime-font { font-family: 'Krona One', sans-serif ; }
        </style>
    </head>
    <body class="md:h-screen w-full bg-gray-200">
      @section('main')
      @show
    </body>
</html>
