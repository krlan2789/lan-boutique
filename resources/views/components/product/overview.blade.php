<x-layout.layout :$title>
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
    <div class="bg-tertiary" x-data="{
        @if ($detail && $detail->colors != null && gettype($detail->colors) == 'array' && collect($detail->colors)->count() > 0) selectedColor @endif: '',
        @if ($detail && $detail->size != null && gettype($detail->size) == 'array' && collect($detail->size)->count() > 0) selectedSize @endif: '',
    }">
        <div class="container pt-24 mx-auto max-w-7xl">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="flex justify-start max-w-sm px-4 mx-0 space-x-2 sm:px-6 lg:max-w-2xl lg:px-8">
                    {{-- <li>
                        <div class="flex items-center">
                            <a href="{{ $url_c }}"
                                class="mr-2 text-sm font-medium text-primary">{{ $category->name }}</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                                class="w-4 h-5 text-dark/70">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li> --}}
                    <li>
                        <div class="flex items-center">
                            <a href="{{ $url_p }}"
                                class="mr-2 text-sm font-medium text-primary">{{ $data->product->name }}</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                                class="w-4 h-5 text-dark/70">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    <li class="text-sm font-bold text-dark/70">
                        {{ $data->name }}
                    </li>
                </ol>
            </nav>

            {{-- <!-- Image gallery -->
            <div class="max-w-2xl mx-auto mt-6 sm:px-6 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:px-8">
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
            <!-- Image gallery --> --}}

            <!-- Product info -->
            <div class="px-6 pt-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,auto,1fr] lg:gap-x-8">

                {{-- Product Images --}}
                <div
                    class="col-span-3 min-h-[512px] row-span-1 pb-8 lg:col-span-2 lg:pb-0 lg:grid lg:row-span-2 lg:grid-cols-3 lg:gap-x-8">
                    <div class="hidden overflow-hidden aspect-h-4 aspect-w-3 lg:block">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                            alt="Two each of gray, white, and black shirts laying flat."
                            class="object-cover object-center w-full h-full">
                    </div>
                    <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <div class="overflow-hidden aspect-h-2 aspect-w-3">
                            <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                                alt="Model wearing plain black basic tee."
                                class="object-cover object-center w-full h-full">
                        </div>
                        <div class="overflow-hidden aspect-h-2 aspect-w-3">
                            <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                                alt="Model wearing plain gray basic tee."
                                class="object-cover object-center w-full h-full">
                        </div>
                    </div>
                    <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-02-featured-product-shot.jpg"
                            alt="Model wearing plain white basic tee." class="object-cover object-center w-full h-full">
                    </div>
                </div>
                {{-- Product Images --}}

                {{-- Product Summary --}}
                <div class="row-span-1 pb-8 lg:row-span-1 lg:col-span-1 lg:pr-8">
                    {{-- Product Name --}}
                    <h1 class="text-base italic font-medium tracking-tight text-dark/80 sm:text-lg">
                        {{ $data->product->name }}
                    </h1>
                    {{-- Product Name --}}

                    {{-- Product Variant Name --}}
                    <h1 class="text-3xl font-semibold tracking-tight text-dark sm:text-4xl">
                        {{ $data->name }}
                    </h1>
                    {{-- Product Variant Name --}}

                    {{-- Price --}}
                    <div class="mt-8">
                        <p class="text-2xl font-medium tracking-tight md:text-3xl text-dark">
                            Rp {{ Number::format(intval($data->price), locale: 'idr') }}
                        </p>
                        <div class="flex items-center gap-2 text-lg md:text-xl">
                            <p class="font-thin line-through decoration-slice decoration-dark/25 text-dark/70">
                                Rp {{ Number::format(intval($data->price), locale: 'idr') }}</p>
                            <p class="font-extrabold text-danger">0%<span class="text-base font-medium"> discount</span>
                            </p>
                        </div>
                    </div>
                    {{-- Price --}}

                    {{-- Summary --}}
                    @if ($detail && $detail->summary)
                        <div class="mt-10">
                            <h3 class="sr-only">Summary</h3>

                            <div class="space-y-6">
                                <p class="text-base text-dark/70">{{ $detail->summary }}</p>
                            </div>
                        </div>
                    @endif
                    {{-- Summary --}}

                </div>
                {{-- Product Name --}}

                {{-- Product Detail --}}
                <div class="pb-8 lg:col-span-2 lg:mt-6 lg:row-span-1 lg:border-r lg:border-quaternary lg:pr-8">
                    {{-- Highlights --}}
                    @if ($detail && $detail->highlights)
                        <div>
                            <h4 class="text-lg font-medium text-dark">Highlights</h4>
                            <div class="mt-2">
                                <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                                    @foreach ($detail->highlights as $hl)
                                        <li class="text-dark/15"><span class="text-dark/70">{{ $hl }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    {{-- Highlights --}}

                    {{-- Description --}}
                    @if ($detail && $detail->description)
                        <div class="mt-2">
                            <h4 class="text-lg font-medium text-dark">Description</h4>
                            <div class="mt-4 space-y-6">
                                <p class="text-sm text-dark/70">{{ $detail->description }}</p>
                            </div>
                        </div>
                    @endif
                    {{-- Description --}}
                </div>
                {{-- Product Detail --}}

                {{-- <div class="hidden lg:block lg:row-span-1 lg:col-span-2"></div> --}}

                {{-- Options --}}
                <div class="lg:row-start-2 lg:col-start-3 lg:col-span-1 lg:row-span-1">
                    <h2 class="sr-only">Product information</h2>
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

                    <form action="/cart" method="POST" class="mt-0">
                        @csrf

                        <input hidden type="text" name="pv_slug" value="{{ $data->product->slug }}" />

                        <!-- Colors -->
                        @if ($detail && $detail->colors != null && gettype($detail->colors) == 'array' && collect($detail->colors)->count() > 0)
                            <div>
                                <div class="flex w-full gap-2">
                                    <h3 class="text-xl font-semibold text-dark">Color</h3>
                                    <span class="text-base text-dark/50" x-text="selectedColor"></span>
                                </div>

                                <fieldset aria-label="Choose a color" class="mt-4">
                                    <div class="flex items-center space-x-2">
                                        @foreach ($detail->colors as $index => $color)
                                            <!-- Active and Checked: "ring ring-offset-1" -->
                                            <label aria-label="White" id="{{ $index . '-' . $color }}"
                                                class="relative -m-0.5 flex cursor-pointer rounded-full items-center justify-center p-0.5 ring-dark/25 focus:outline-none">
                                                <input type="radio" name="color-choice" value="{{ $color }}"
                                                    x-model="{{ 'selectedColor' }} = '{{ $color }}'"
                                                    class="sr-only peer" {{ $index == 0 ? 'checked' : '' }}>
                                                <span
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
                        @if ($detail && $detail->size != null && gettype($detail->size) == 'array' && collect($detail->size)->count() > 0)
                            <div class="mt-10">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-semibold text-dark">Size</h3>
                                    <a href="#"
                                        class="text-sm font-medium text-primary hover:text-primary/80">Size
                                        guide</a>
                                </div>

                                <fieldset aria-label="Choose a size" class="mt-4">
                                    <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                        @foreach ($detail->size as $s)
                                            <label
                                                class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="{{ $s }}"
                                                    x-model="{{ 'selectedSize' }} = '{{ $s }}'"
                                                    class="sr-only peer">
                                                <span>{{ $s }}</span>
                                                <span
                                                    class="absolute pointer-events-none peer -inset-px peer-checked:ring peer-checked:ring-primary peer-checked:ring-offset-1"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        @endif
                        <!-- Sizes -->

                        <button type="submit" :disabled="selectedColor == '' || selectedSize == ''"
                            class="flex items-center justify-center w-full px-8 py-3 mt-10 text-base font-medium border border-transparent cursor-pointer text-tertiary bg-success hover:bg-success/80 focus:outline-none focus:ring-2 focus:ring-success/80 focus:ring-offset-2">Enquire
                            Now</button>
                    </form>
                </div>
                {{-- Options --}}
            </div>
            <!-- Product info -->
        </div>
    </div>
</x-layout.layout>
