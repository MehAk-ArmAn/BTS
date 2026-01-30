<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>⋆✦✧⋆ BTS Meme Gallery ⋆✦✧⋆</title>
        <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicons/logo.png') }}" type="image/x-icon">
    </head>
    <body>
        <h1>BTS Meme Gallery 💜😂</h1>
        <div class="gallery">
            @foreach($pics as $pic)
                <div class="pic">
                    <img src="{{ asset('extra_gallery/' . $pic->filename) }}" alt="BTS Meme">
                </div>
            @endforeach

        </div>
    </body>
</html>
