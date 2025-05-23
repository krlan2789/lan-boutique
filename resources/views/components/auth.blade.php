<x-layout.layout>
    <div class="bg-tertiary dark:bg-dark">
        <div class="flex justify-center h-auto min-h-screen">
            <div class="hidden bg-cover md:w-1/2 md:block lg:w-2/3"
                style="background-image: url(/img/beautiful-casual-woman-fashion-set.jpg)">
                <div
                    class="flex items-center justify-start h-full px-20 bg-gradient-to-r from-primary/80 via-80% to-tertiary">
                    <div>
                        <h2 class="text-4xl font-semibold brand-name text-quaternary sm:text-5xl">
                            {{ env('APP_NAME', 'Boutique') }}
                        </h2>

                        <p class="max-w-lg mt-6 xl:max-w-3xl text-quaternary">
                            {!! request()->is('login')
                                ? 'Welcome back! <strong>Unleash your unique style</strong> with our exclusive collections. 🌟'
                                : 'Join our community and step into <strong>the world of fashion</strong> with exclusive deals and trends. 💫' !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full h-full min-h-screen md:max-w-md md:mx-auto md:w-1/2 lg:w-2/6"
                id="content-auth-page">
                @if (request()->is('register'))
                    <x-register></x-register>
                @else
                    <x-login></x-login>
                @endif
            </div>
        </div>
    </div>
</x-layout.layout>

<style scoped>
    #content-auth-page {
        background-image: url(/img/beautiful-casual-woman-fashion-set.jpg);
        background-size: cover;
    }

    @media (min-width: 768px) {
        #content-auth-page {
            background-image: none;
        }
    }
</style>
