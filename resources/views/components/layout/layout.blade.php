<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth" :class="{ 'dark': darkMode }" x-data="{ darkMode: false }">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/Logo_Full.ico?">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title ?? env('APP_NAME', 'Boutique') }}</title>
</head>

<body class="h-full" x-data="{ isLiveSearchShow: false }">
    <div class="h-auto">
        <x-layout.navbar></x-layout.navbar>
        {{-- <x-layout.flyout-menu></x-layout.flyout-menu> --}}

        {{ $slot }}

        <x-layout.footer></x-layout.footer>
    </div>

    @if (session()->has('status'))
        <x-layout.modal-dialog :title="'' . session('status.title')" :message="'' . session('status.message')" btnLabel="Okay"
            :autoShow="true"></x-layout.modal-dialog>
    @endif

    <x-layout.loading></x-layout.loading>

    @vite('resources/js/app.js')
</body>

</html>
