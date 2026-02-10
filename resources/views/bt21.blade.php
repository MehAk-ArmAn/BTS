<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your favicon -->
    <link rel="shortcut icon" href="{{ asset('favicons/logo.png') }}" type="image/x-icon">

    <!-- Page title -->
    <title>⋆✦✧⋆ Bt21 ⋆✦✧⋆</title>

    <link rel="stylesheet" href="{{ asset('css/bt21.css') }}">
</head>
<body>
    <h1>BT21 💜</h1>

    <!-- Hidden navbar -->
    @include('partials.secret-navbar')
    <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/secret-navbar.css') }}">
    <!-- JS -->
    <script src="{{ asset('js/bts.js') }}"></script>
</body>
</html>

