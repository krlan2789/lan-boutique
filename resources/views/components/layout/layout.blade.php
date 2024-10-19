<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth" :class="{ 'dark': darkMode }" x-data="{ darkMode: false }">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/Logo LAN_WB_Full.ico?">
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

<body class="h-full" x-data="{ isModalWindowShow: true }">
    <div class="min-h-full">
        @isset($admin)
            <x-layout.sidebar></x-layout.sidebar>
        @else
            <x-layout.navbar></x-layout.navbar>
        @endisset

        {{ $slot }}

        <x-layout.footer></x-layout.footer>
    </div>

    @if (session()->has('status'))
        <div x-show="isModalWindowShow" @click.outside="isModalWindowShow = false"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="absolute top-0 bottom-0 left-0 right-0 z-50 bg-dark/40" id="modal-window">
            <div class="flex items-center justify-center min-h-screen">
                <div class="px-16 rounded-lg bg-tertiary py-14">
                    <div class="flex justify-center">
                        <div class="p-6 rounded-full bg-success/75">
                            <div class="flex items-center justify-center w-16 h-16 p-4 rounded-full bg-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-tertiary">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="my-4 text-3xl font-semibold text-center text-primary">{{ session('status.title') }}</h3>
                    <p class="w-[230px] text-center font-normal text-primary">{{ session('status.message') }}</p>
                    <button @click="isModalWindowShow = false"
                        class="block px-6 py-3 mx-auto mt-10 text-base font-medium text-center border-4 border-transparent text-tertiary bg-primary rounded-xl outline-8 hover:outline hover:duration-300">Okay</button>
                </div>
            </div>
        </div>
    @endif

    @vite('resources/js/app.js')
</body>

</html>
