<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Vue</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- @vite(['resources/js/app.js']) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div id="app">
    Hello
    <!-- <example-component></example-component> -->
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
