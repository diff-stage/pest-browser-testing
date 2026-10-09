<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · Corner Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-50 text-zinc-900">
    <header class="border-b border-zinc-200 bg-white px-6 py-4">
        <a href="{{ route('basket.show') }}" class="font-semibold">Corner Shop</a>
    </header>
    <main class="mx-auto max-w-xl px-6 py-10">
        {{ $slot }}
    </main>
</body>
</html>
