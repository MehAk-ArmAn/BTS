<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Supports emojis and all text -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mobile-friendly -->
    <title>✧✦⋆✧✦⋆ B T S ⋆✦✧⋆✧✦⋆</title>
    <link rel="stylesheet" href="{{ asset('css/bts.css') }}">
    <link rel="shortcut icon" href="{{ asset('imgs/bts-0t7_aesthetic_icon.png') }}" type="image/x-icon">
</head>
<body>
    <h1>BTS</h1>

    <!-- Hidden navbar -->
        @include('partials.secret-navbar')
        <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/secret-navbar.css') }}">
        <!-- JS -->
        <script src="{{ asset('js/bts.js') }}"></script>
</body>
</html>
