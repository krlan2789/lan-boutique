{{-- Wide screen : Desktop, Laptop, Tablet (Landscape) --}}
<nav class="fixed top-0 left-0 z-20 hidden w-full md:block bg-tertiary border-b-[1px] border-dark/15"
    x-data="{ isNavbarOpen: false }">
    <div class="container mx-auto md:px-6">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/" class="flex flex-row gap-2">
                        <img class="size-8" src="/img/logo/Logo_only.webp" alt="LAN Technology">
                        <span class="text-xl leading-relaxed align-middle brand-name">{{ env('APP_NAME') }}</span>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline ml-4 space-x-1 lg:ml-10 lg:space-x-4">
                        @foreach ($menu as $idx => $m)
                            <a href="{{ $m['route'] }}"
                                class="px-3 py-2 navbar-link {{ request()->is(Str::substr($m['route'], 1)) ? 'active' : '' }}">
                                {{ $m['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center ml-4 md:ml-6">
                    {{-- Button Show LiveSearch --}}
                    <div class="relative text-primary size-8">
                        <button @click="isLiveSearchShow = true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24"
                                class="fill-current" style="transform: ;msFilter:;">
                                <path
                                    d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                </path>
                                <path
                                    d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    {{-- Button Show LiveSearch --}}

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" @click="isNavbarOpen = !isNavbarOpen"
                                class="relative flex items-center max-w-xs text-sm bg-primary focus:outline-none focus:ring-2 focus:ring-tertiary focus:ring-offset-2 focus:ring-offset-primary"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <span class="p-1 size-8 bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="current" viewBox="0 0 24 24"
                                        style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                        <path
                                            d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <div x-cloak x-show="isNavbarOpen ?? false" @click.outside="isNavbarOpen = false"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right shadow-lg bg-tertiary ring-1 ring-dark ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 navbar-link" role="menuitem" tabindex="-1"
                                id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 navbar-link" role="menuitem" tabindex="-1"
                                id="user-menu-item-1">Settings</a>
                            @auth
                                <a href="/login" class="block px-4 py-2 navbar-link" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">Login</a>
                            @else
                                <a href="/login" class="block px-4 py-2 navbar-link danger" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">Logout</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- Wide screen : Desktop, Laptop, Tablet (Landscape) --}}

{{-- Small screen : Phone, Tablet (Potrait) --}}
<nav class="fixed top-0 left-0 z-20 flex flex-col w-full md:hidden bg-tertiary border-b-[1px] border-dark/15"
    :class="{ 'h-screen': isNavbarOpen }" x-data="{ isNavbarOpen: false }">

    <div class="px-3 mx-0 max-w-7xl">
        <div class="flex items-center justify-between h-16">
            {{-- Button Show LiveSearch --}}
            <div class="relative text-primary size-10">
                <button @click="isLiveSearchShow = true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24"
                        class="fill-current" style="transform: ;msFilter:;">
                        <path
                            d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                        </path>
                        <path
                            d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z">
                        </path>
                    </svg>
                </button>
            </div>
            {{-- Button Show LiveSearch --}}

            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/" class="flex flex-row gap-2">
                        <img class="size-8" src="/img/logo/Logo_only.webp" alt="LAN Technology">
                        <span class="text-xl leading-relaxed align-middle brand-name">{{ env('APP_NAME') }}</span>
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" @click="isNavbarOpen = !isNavbarOpen"
                    class="relative inline-flex items-center justify-center p-2 text-tertiary bg-primary hover:bg-tertiary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-primary"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isNavbarOpen, 'block': !isNavbarOpen }" class="block w-6 h-6"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'hidden': !isNavbarOpen, 'block': isNavbarOpen }" class="hidden w-6 h-6"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Mobile menu button -->
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-cloak x-show="isNavbarOpen ?? false"
        x-transition:enter="transition ease-out origin-top duration-300 transform"
        x-transition:enter-start="opacity-0 scale-y-95" x-transition:enter-end="opacity-100 scale-y-100"
        x-transition:leave="transition ease-in duration-75 transform"
        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-95"
        class="flex-1 shadow-md md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @foreach ($menu as $m)
                <a href="{{ $m['route'] }}"
                    class="px-3 py-2 navbar-link mobile {{ request()->is(Str::substr($m['route'], 1)) ? 'active' : '' }}">
                    {{ $m['name'] }}
                </a>
            @endforeach
        </div>
        <div class="pt-6 pb-4 border-t-2 border-dark/15">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-secondary">Tom Cook</div>
                    <div class="text-sm font-medium leading-none text-secondary">tom@example.com</div>
                </div>
            </div>
            <div class="px-2 mt-3 space-y-1">
                <a href="#" class="px-3 py-2 navbar-link mobile">Your
                    Profile</a>
                <a href="#" class="px-3 py-2 navbar-link mobile">Settings</a>
                @auth
                    <a href="/login" class="px-4 py-2 navbar-link mobile">Login</a>
                @else
                    <a href="/login" class="px-4 py-2 navbar-link mobile danger">Logout</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
{{-- Small screen : Phone, Tablet (Potrait) --}}

<x-layout.modal-live-search></x-layout.modal-live-search>
