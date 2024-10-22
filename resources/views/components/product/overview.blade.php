<x-layout.layout>
    <!--
    This example requires some changes to your config:
    ```
    // tailwind.config.js
    module.exports = {
        // ...
        theme: {
            extend: {
                gridTemplateRows: {
                    '[auto,auto,1fr]': 'auto auto 1fr',
                },
            },
        },
        plugins: [
            // ...
            require('@tailwindcss/aspect-ratio'),
        ],
    }
    ```
    -->
    <div class="bg-tertiary">
        <div class="pt-24">
            <nav aria-label="Breadcrumb">
                <ol role="list"
                    class="flex items-center max-w-2xl px-4 mx-auto space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-primary">Men</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                                class="w-4 h-5 text-dark/70">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-primary">Clothing</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                                aria-hidden="true" class="w-4 h-5 text-dark/70">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-dark/70 hover:text-dark">Basic
                            Tee 6-Pack</a>
                    </li>
                </ol>
            </nav>

            <!-- Image gallery -->
            <div class="max-w-2xl mx-auto mt-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                <div class="hidden overflow-hidden aspect-h-4 aspect-w-3 lg:block">
                    <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                        alt="Two each of gray, white, and black shirts laying flat."
                        class="object-cover object-center w-full h-full">
                </div>
                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="overflow-hidden aspect-h-2 aspect-w-3">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                            alt="Model wearing plain black basic tee." class="object-cover object-center w-full h-full">
                    </div>
                    <div class="overflow-hidden aspect-h-2 aspect-w-3">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                            alt="Model wearing plain gray basic tee." class="object-cover object-center w-full h-full">
                    </div>
                </div>
                <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden">
                    <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-featured-product-shot.jpg"
                        alt="Model wearing plain white basic tee." class="object-cover object-center w-full h-full">
                </div>
            </div>
            <!-- Image gallery -->

            <!-- Product info -->
            <div
                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-r lg:border-quaternary lg:pr-8">
                    <h1 class="text-base italic font-medium tracking-tight text-dark/80 sm:text-lg">
                        {{ $data->product->name }}
                    </h1>
                    <h1 class="text-3xl font-semibold tracking-tight text-dark sm:text-4xl">{{ $data->name }}</h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl font-normal tracking-tight md:text-4xl text-dark">
                        Rp {{ Number::format(intval($data->price), locale: 'idr') }}
                    </p>

                    <!-- Reviews -->
                    {{-- <div class="mt-6">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <!-- Active: "text-warning", Default: "text-dark/20" -->
                                <svg class="flex-shrink-0 w-5 h-5 text-warning" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg class="flex-shrink-0 w-5 h-5 text-warning" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg class="flex-shrink-0 w-5 h-5 text-warning" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg class="flex-shrink-0 w-5 h-5 text-warning" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <svg class="flex-shrink-0 w-5 h-5 text-dark/20" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="sr-only">4 out of 5 stars</p>
                            <a href="#" class="ml-3 text-sm font-medium text-success hover:text-success/80">117
                                reviews</a>
                        </div>
                    </div> --}}
                    <!-- Reviews -->

                    <form class="mt-10">
                        <!-- Colors -->
                        @if (
                            $data->product->colors != null &&
                                gettype($data->product->colors) == 'array' &&
                                collect($data->product->colors)->count() > 0)
                            <div>
                                <h3 class="text-sm font-medium text-dark">Color</h3>

                                <fieldset aria-label="Choose a color" class="mt-4">
                                    <div class="flex items-center space-x-2">
                                        @foreach ($data->product->colors as $color)
                                            <!-- Active and Checked: "ring ring-offset-1" -->
                                            <label aria-label="White"
                                                class="relative -m-0.5 flex cursor-pointer rounded-full items-center justify-center p-0.5 ring-dark/25 focus:outline-none">
                                                <input type="radio" name="color-choice" value="{{ $color }}"
                                                    class="sr-only peer">
                                                <span aria-hidden="true"
                                                    class="m-0.5 border rounded-full size-7 peer border-dark border-opacity-10 peer-checked:m-0 peer-checked:ring peer-checked:size-8 peer-checked:ring-primary peer-checked:ring-offset-1"
                                                    style="background-color: {{ $color }};"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        @endif
                        <!-- Colors -->

                        <!-- Sizes -->
                        <div class="mt-10">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-medium text-dark">Size</h3>
                                <a href="#" class="text-sm font-medium text-primary hover:text-primary/80">Size
                                    guide</a>
                            </div>

                            <fieldset aria-label="Choose a size" class="mt-4">
                                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border cursor-not-allowed text-quaternary group bg-tertiary hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="XXS" disabled
                                            class="sr-only">
                                        <span>XXS</span>
                                        <span aria-hidden="true"
                                            class="absolute border-2 pointer-events-none border-quaternary -inset-px">
                                            <svg class="absolute inset-0 w-full h-full stroke-2 text-quaternary"
                                                viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                                <line x1="0" y1="100" x2="100" y2="0"
                                                    vector-effect="non-scaling-stroke" />
                                            </svg>
                                        </span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="XS" class="sr-only">
                                        <span>XS</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px" aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="S" class="sr-only">
                                        <span>S</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="M" class="sr-only">
                                        <span>M</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="L" class="sr-only">
                                        <span>L</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="XL" class="sr-only">
                                        <span>XL</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="2XL" class="sr-only">
                                        <span>2XL</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                    <!-- Active: "ring-2 ring-success/80" -->
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                        <input type="radio" name="size-choice" value="3XL" class="sr-only">
                                        <span>3XL</span>
                                        <!--
                                        Active: "border", Not Active: "border-2"
                                        Checked: "border-success/80", Not Checked: "border-transparent"
                                        -->
                                        <span class="absolute pointer-events-none -inset-px"
                                            aria-hidden="true"></span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <!-- Sizes -->

                        <button type="submit"
                            class="flex items-center justify-center w-full px-8 py-3 mt-10 text-base font-medium border border-transparent text-tertiary bg-success text-tertiabg-tertiary hover:bg-success/80 focus:outline-none focus:ring-2 focus:ring-success/80 focus:ring-offset-2">Add
                            to bag</button>
                    </form>
                </div>

                <div
                    class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-quaternary lg:pb-16 lg:pr-8 lg:pt-6">
                    <!-- Description and details -->
                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-dark/70">The Basic Tee 6-Pack allows you to fully express your
                                vibrant personality with three grayscale options. Feeling adventurous? Put on a heather
                                gray
                                tee. Want to be a trendsetter? Try our exclusive colorway: &quot;Black&quot;. Need to
                                add an
                                extra pop of color to your outfit? Our white tee has you covered.</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-dark">Highlights</h3>

                        <div class="mt-4">
                            <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                                <li class="text-dark/15"><span class="text-dark/70">Hand cut and sewn locally</span>
                                </li>
                                <li class="text-dark/15"><span class="text-dark/70">Dyed with our proprietary
                                        colors</span></li>
                                <li class="text-dark/15"><span class="text-dark/70">Pre-washed &amp;
                                        pre-shrunk</span>
                                </li>
                                <li class="text-dark/15"><span class="text-dark/70">Ultra-soft 100% cotton</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-dark">Details</h2>

                        <div class="mt-4 space-y-6">
                            <p class="text-sm text-dark/70">The 6-Pack includes two black, two white, and two heather
                                gray
                                Basic Tees. Sign up for our subscription service and be the first to get new, exciting
                                colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
                        </div>
                    </div>
                    <!-- Description and details -->
                </div>
            </div>
            <!-- Product info -->
        </div>
    </div>
</x-layout.layout>
