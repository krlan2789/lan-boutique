<div x-init="isModalWindowShow = {{ $autoShow ?? false }}" x-show="isModalWindowShow" x-data="{ isModalWindowShow: true }" @click.outside="isModalWindowShow = false"
    x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
    class="fixed top-0 bottom-0 left-0 right-0 z-50 bg-dark/40" id="modal-window">
    <div class="flex items-center justify-center min-h-screen">
        <div class="px-16 py-8 bg-tertiary">
            <div class="flex justify-center">
                <div class="p-6 rounded-full bg-success/75">
                    <div class="flex items-center justify-center w-16 h-16 p-4 rounded-full bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-tertiary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="my-4 text-3xl font-semibold text-center text-primary">{{ $title }}</h3>
            <p class="w-auto max-w-4xl font-normal text-center min-w-max text-primary">{{ $message }}</p>
            <button @click="isModalWindowShow = false"
                class="block px-6 py-3 mx-auto mt-10 text-base font-medium text-center border-4 border-transparent text-tertiary bg-primary outline-8 hover:outline hover:duration-300">{{ $btnLabel }}</button>
        </div>
    </div>
</div>
