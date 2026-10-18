<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">
    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4">
            <a href="/" class="font-semibold">{{ config('app.name') }}</a>
            <nav class="flex gap-6 text-sm">
                <a href="/zeiten" wire:navigate class="{{ request()->is('zeiten') ? 'font-semibold text-emerald-700' : 'text-gray-600 hover:text-gray-900' }}">Zeiten</a>
                <a href="/zeiten/erfassen" wire:navigate class="{{ request()->is('zeiten/erfassen') ? 'font-semibold text-emerald-700' : 'text-gray-600 hover:text-gray-900' }}">Erfassen</a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-8">
        {{ $slot }}
    </main>
</body>
</html>
