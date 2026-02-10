<!DOCTYPE html>
<html>
    <head>

        <title>⋆✦✧⋆ Vote ⋆✦✧⋆</title>
        <link rel="stylesheet" href="{{ asset('css/vote.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicons/logo.png') }}" type="image/x-icon">  

    </head>
    <body>

        <h1>Vote for your Bias 💜</h1>

        <form action="/vote" method="POST">
            @csrf <!-- security token -->
<!-- Laravel uses "CSRF" tokens to make sure POST requests come from trusted forms and not external malicious sites. -->
            <select name="member" class="input" required>
                <!-- name is used to send this input’s value to the server -->
                <option value="🎤 Rap Monster">Kim Namjoon</option>
                <option value="😼 Suga">Min Yoongi</option>
                <option value="😀 Jiminaaaa">Park Jimin</option>
                <option value="😎World Wide Handsome Jin">Kim Seokjin</option>
                <option value="🕺🏻 Hobi">Jung Hoseuk</option>
                <option value="✌🏻 V">Kim Taehyung</option>
                <option value="💀 Jk">Jeon Jungkook</option>
            </select>
            <button class="btn" type="submit">Vote 🎉</button> <!-- to submit the vote -->
        </form>


        <!-- Hidden navbar -->
        @include('partials.secret-navbar')
        <!-- Link CSS -->
    <link rel="stylesheet" href="{{ asset('css/secret-navbar.css') }}">
        <!-- JS -->
        <script src="{{ asset('js/bts.js') }}"></script>
    </body>
</html>
