<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> <!-- Supports emojis and all text -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mobile-friendly -->
        <title>⋆✧✦⋆ BTS QUOTES ⋆✦✧⋆</title>
        <link rel="stylesheet" href="{{ asset('css/quotes.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicons/logo.png') }}" type="image/x-icon">
    </head>
    <body>
        <h1>BTS Quotes 💜</h1> <!-- Main title -->

        <div class="body">
            <!-- Loop through members -->
            @for ($i = 0; $i < count($members); $i++)
                <div class="member">
                    <span>{{ $members[$i] }}</span> <!-- Member name -->
                    <p>“{{ $quotes[$i] }}”</p> <!-- Quote/lyrics -->
                </div>
            @endfor
        </div>
        <!-- Hidden navbar -->
        @include('partials.secret-navbar')
        <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/secret-navbar.css') }}">
        <!-- JS -->
        <script src="{{ asset('js/bts.js') }}"></script>
    </body>
</html>
