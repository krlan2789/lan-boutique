{{-- Wide screen : Desktop, Laptop, Tablet (Landscape) --}}
<nav class="fixed top-0 left-0 z-20 hidden w-full md:block bg-tertiary border-b-[1px] border-primary/25"
    x-data="{ isNavbarOpen: false }">
    <div class="container mx-auto md:px-6">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/"><img class="size-8" src="/img/logo/Logo_only_wb.webp" alt="LAN Technology"></a>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline ml-10 space-x-4">
                        <a href="/new-arrival"
                            class="px-3 py-2 navbar-link {{ request()->is('new-arrival') ? 'active' : '' }}">New
                            Arrival</a>
                        <a href="/c/women"
                            class="px-3 py-2 navbar-link {{ request()->is('c/women') ? 'active' : '' }}">Women</a>
                        <a href="/c/men"
                            class="px-3 py-2 navbar-link {{ request()->is('c/men') ? 'active' : '' }}">Men</a>
                        <a href="/c/top"
                            class="px-3 py-2 navbar-link {{ request()->is('c/top') ? 'active' : '' }}">Top</a>
                        <a href="/c/bottom"
                            class="px-3 py-2 navbar-link {{ request()->is('c/bottom') ? 'active' : '' }}">Bottom</a>
                        <a href="/c/accessories"
                            class="px-3 py-2 navbar-link {{ request()->is('c/accessories') ? 'active' : '' }}">Accessories</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center ml-4 md:ml-6">
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

                        <div x-show="isNavbarOpen" @click.outside="isNavbarOpen = false"
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
<nav class="fixed top-0 left-0 z-20 flex flex-col w-full md:hidden bg-tertiary border-b-[1px] border-primary/25"
    :class="{ 'h-screen': isNavbarOpen }" x-data="{ isNavbarOpen: false }">

    <div class="px-6 mx-0 max-w-7xl">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8" src="/img/logo/Logo_only_wb.webp" alt="LAN Technology">
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex -mr-3 md:hidden">
                <button type="button" @click="isNavbarOpen = !isNavbarOpen"
                    class="relative inline-flex items-center justify-center p-2 text-tertiary bg-primary hover:bg-tertiary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-primary"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isNavbarOpen, 'block': !isNavbarOpen }" class="block w-6 h-6"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
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
    <div x-show="isNavbarOpen" x-transition:enter="transition ease-out origin-top duration-300 transform"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="flex-1 shadow-md md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/new-arrival"
                class="px-3 py-2 navbar-link mobile {{ request()->is('new-arrival') ? 'active' : '' }}">New
                Arrival</a>
            <a href="/c/women"
                class="px-3 py-2 navbar-link mobile {{ request()->is('c/women') ? 'active' : '' }}">Women</a>
            <a href="/c/men"
                class="px-3 py-2 navbar-link mobile {{ request()->is('c/men') ? 'active' : '' }}">Men</a>
            <a href="/c/top"
                class="px-3 py-2 navbar-link mobile {{ request()->is('c/top') ? 'active' : '' }}">Top</a>
            <a href="/c/bottom"
                class="px-3 py-2 navbar-link mobile {{ request()->is('c/bottom') ? 'active' : '' }}">Bottom</a>
            <a href="/c/accessories"
                class="px-3 py-2 navbar-link mobile {{ request()->is('c/accessories') ? 'active' : '' }}">Accessories</a>
        </div>
        <div class="pt-6 pb-4 border-t border-opacity-50 border-primary">
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
