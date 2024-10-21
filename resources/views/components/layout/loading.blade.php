<div x-data="{ loading: {{ $autoShow ?? true }} }" x-model="loading" x-init="window.addEventListener('load', () => setTimeout(() => loading = false, 250))" x-show="loading"
    x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-70"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-70"
    class="fixed top-0 bottom-0 left-0 right-0 bg-tertiary z-[9999]">
    <div class="flex items-center justify-center min-h-screen p-5 min-w-screen">

        <div class="flex space-x-2">
            <div class="rounded-full size-5 bg-primary animate-bounce1"></div>
            <div class="rounded-full size-5 bg-primary animate-bounce2"></div>
            <div class="rounded-full size-5 bg-primary animate-bounce3"></div>
        </div>

    </div>
</div>
