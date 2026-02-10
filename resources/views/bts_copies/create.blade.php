<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>⋆✦✧⋆ BTS Copies Creator ⋆✦✧⋆</title>
    <link rel="stylesheet" href="{{ asset('css/bts_copies.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicons/logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h2>🧩 BTS Copies Creator</h2>

        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <b>Fix these:</b>
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('bts_copies.store') }}">
            @csrf

            <label>BTS Member *</label>
            <select name="bts_name" required>
                <option value="">⋆✦✧⋆ Select BTS Member ⋆✦✧⋆</option>
                <option value="Kim Namjoon">⋆✦✧⋆ Kim Namjoon ⋆✦✧⋆</option>
                <option value="Kim Seokjin">⋆✦✧⋆ Kim Seokjin ⋆✦✧⋆</option>
                <option value="Min Yoongi">⋆✦✧⋆ Min Yoongi ⋆✦✧⋆</option>
                <option value="Jung Hoseok">⋆✦✧⋆ Jung Hoseok ⋆✦✧⋆</option>
                <option value="Park Jimin">⋆✦✧⋆ Park Jimin ⋆✦✧⋆</option>
                <option value="Kim Taehyung">⋆✦✧⋆ Kim Taehyung ⋆✦✧⋆</option>
                <option value="Jeon Jungkook">⋆✦✧⋆ Jeon Jungkook ⋆✦✧⋆</option>
            </select>
            <br>
            <br>

            <label>Copy Extra Name</label>
            <input type="text" name="copy_extra_name" value="{{ old('copy_extra_name') }}" placeholder="e.g. BTS, Beyond The Scenes, LY">

            <label>Copy Title *</label>
            <input type="text" name="copy_title" value="{{ old('copy_title') }}"
                placeholder="Must include BTS Name inside it" required>

            <div class="hint">
                Rule: the title must contain the BTS Name
                (example: <i>BTS_nickname - Copy for _ member</i>)
            </div>

            <label>Description</label>
            <textarea name="description" rows="6" placeholder="Write details...">{{ old('description') }}</textarea>

            <button type="submit">Save Copy ✅</button>
        </form>
    </div>
</body>
</html>
