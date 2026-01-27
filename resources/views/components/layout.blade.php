@props(['title' => null, 'description' => null, 'keywords' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $description ?? 'Waveshark Ventures - Premier tour and travel services offering jetski rentals, island hopping, and hotel bookings.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'waveshark, travel, tour, jetski, hotel, holiday, vacation' }}">
    <meta name="author" content="Waveshark Ventures">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? config('app.name', 'Waveshark Ventures') }}">
    <meta property="og:description" content="{{ $description ?? 'Waveshark Ventures - Premier tour and travel services offering jetski rentals, island hopping, and hotel bookings.' }}">
    <meta property="og:image" content="{{ asset('images/logo-waveshart-removebg.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? config('app.name', 'Waveshark Ventures') }}">
    <meta property="twitter:description" content="{{ $description ?? 'Waveshark Ventures - Premier tour and travel services offering jetski rentals, island hopping, and hotel bookings.' }}">
    <meta property="twitter:image" content="{{ asset('images/logo-waveshart-removebg.png') }}">

    <title>{{ $title ?? config('app.name', 'Waveshark Ventures') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-waveshart-removebg.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-black text-white selection:bg-gold-500 selection:text-black overflow-x-hidden">
    {{ $slot }}
</body>

</html>