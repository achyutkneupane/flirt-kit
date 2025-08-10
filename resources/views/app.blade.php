<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark bg-white dark:bg-black">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Filament & Inertia Kit') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    @viteReactRefresh
    @vite(['resources/js/App.tsx', "resources/js/Pages/{$page['component']}.tsx", "resources/css/app.css"])
    @inertiaHead
</head>
<body class="text-white font-sans">
@routes
@inertia
</body>
</html>
