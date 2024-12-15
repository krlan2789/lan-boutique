<script>
    function carouselPrev(current, total) {
        if (current <= 0) current = total - 1;
        else current -= 1;
        return current;
    }

    function carouselNext(current, total) {
        if (current >= total - 1) current = 0;
        else current += 1;
        return current;
    }

    function isFavorite(key) {
        return localStorage.getItem(key) ? true : false;
    }

    function toggleFavorite(key) {
        let status = isFavorite(key);
        if (status) localStorage.removeItem(key);
        else localStorage.setItem(key, status);
        console.log(key + ": " + status);
        return status;
    }
</script>

<x-layout.layout :title="$data->name">
    <div class="bg-tertiary" x-data="{
        favorite: isFavorite({{ "'" . $data->slug . "'" }}),
        @if ($detail && ($detail->highlights || $detail->description)) selectedTab: @if ($detail->highlights) 0 @else 1 @endif @endif,
        @if ($detail && $detail->colors != null && gettype($detail->colors) == 'array' && collect($detail->colors)->count() > 0) selectedColor: '', @endif
        @if ($detail && $detail->size != null && gettype($detail->size) == 'array' && collect($detail->size)->count() > 0) selectedSize: '', @endif
    }">
        <div class="container pt-24 mx-auto xl:max-w-7xl">
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
                            <a href="{{ $url }}"
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

            <!-- Product info -->
            <div class="px-6 pt-8 mb-12 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,auto,1fr] lg:gap-x-8">

                {{-- Product Images --}}
                @if ($detail && $detail->images != null && gettype($detail->images) == 'array' && collect($detail->images)->count() > 0)
                    <div x-data="{ selectedImage: 0, totalImages: {{ collect($detail->images)->count() }} }"
                        class="col-span-3 min-h-[480px] max-h-[640px] h-[56vh] row-span-1 pb-4 lg:col-span-2 lg:pb-0 lg:row-span-2 grid grid-rows-[1fr,1fr,1fr,auto] grid-cols-[auto,1fr,1fr,1fr] gap-2">
                        <!-- Carousel Wrapper -->
                        <div class="relative col-span-4 row-span-3 overflow-hidden md:row-span-4 md:col-span-3">
                            <div class="relative size-full bg-tertiary">
                                @foreach ($detail->images as $index => $img)
                                    <div x-show="selectedImage == {{ $index }}"
                                        x-transition:enter="transition transform duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition transform duration-300"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="absolute top-0 size-full">
                                        {{-- style="background-image: url('{{ $img }}');" --}}
                                        <img src="{{ $img }}" alt="{{ $data->name }}"
                                            class="w-auto h-full mx-auto bg-contain" />
                                    </div>
                                @endforeach
                            </div>
                            {{-- Previous Index --}}
                            <button @click="selectedImage = carouselPrev(selectedImage, totalImages)"
                                class="absolute top-0 bottom-0 left-0 h-full px-2 w-14 text-dark/70 from-tertiary/25 to-tertiary/0 hover:from-tertiary/50 bg-gradient-to-r hover:to-tertiary/0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    style="transform: ;msFilter:;">
                                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z">
                                    </path>
                                </svg>
                            </button>
                            {{-- Previous Index --}}

                            {{-- Next Index --}}
                            <button @click="selectedImage = carouselNext(selectedImage, totalImages)"
                                class="absolute top-0 bottom-0 right-0 h-full px-2 w-14 text-dark/70 from-tertiary/25 to-tertiary/0 hover:from-tertiary/50 bg-gradient-to-l hover:to-tertiary/0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    style="transform: ;msFilter:;">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                    </path>
                                </svg>
                            </button>
                            {{-- Next Index --}}
                        </div>
                        <!-- Carousel Wrapper -->

                        <!-- Carousel Index -->
                        <div
                            class="h-[72px] flex col-span-4 row-span-1 w-full custom-scrollable-x md:custom-scrollable-y md:h-full md:w-32 md:row-start-1 md:col-span-1 md:row-span-4">
                            <div class="flex h-full gap-3 pb-2 flex-nowrap md:flex-col">
                                @foreach ($detail->images as $index => $img)
                                    <button @click="selectedImage = {{ $index }}"
                                        style="background-image: url('{{ Str::replace('.jpg', '_5(0.05).jpg', $img) }}');"
                                        class="size-[72px] hover:opacity-80 bg-cover"
                                        :class="{
                                            'border-primary': selectedImage == {{ $index }},
                                            'border-2': selectedImage == {{ $index }},
                                            'opacity-80': selectedImage == {{ $index }}
                                        }">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <!-- Carousel Index -->
                    </div>
                @else
                    <div
                        class="col-span-3 min-h-[480px] max-h-[640px] h-[56vh] row-span-1 pb-4 lg:col-span-2 lg:pb-0 lg:row-span-2">
                    </div>
                @endif
                {{-- Product Images --}}

                {{-- Product Summary --}}
                <div class="row-span-1 pb-4 lg:pb-8 lg:row-span-1 lg:col-span-1 lg:pr-8">
                    {{-- Product Name --}}
                    <h1 class="text-sm italic font-medium tracking-tight text-dark/80 sm:text-base">
                        {{ $data->product->name }}
                    </h1>
                    {{-- Product Name --}}

                    {{-- Product Variant Name --}}
                    <h1 class="text-2xl font-semibold tracking-tight text-dark sm:text-3xl">
                        {{ $data->name }}
                    </h1>
                    {{-- Product Variant Name --}}

                    {{-- Price --}}
                    <div class="mt-4 lg:mt-8">
                        <p class="text-2xl font-medium tracking-tight md:text-3xl text-dark">
                            Rp {{ Number::format(intval($price), locale: 'idr') }}
                        </p>
                        @if ($promo)
                            <div class="flex items-center text-lg md:text-xl">
                                <p
                                    class="flex flex-row mr-2 font-thin line-through decoration-slice decoration-dark/25 text-dark/70">
                                    Rp {{ Number::format(intval($data->price), locale: 'idr') }}
                                </p>
                                <p class="text-3xl font-extrabold text-center text-danger">
                                    {{ $promo['isPercent'] ? $promo['nominal'] : Number::format(intval($promo['nominal']), locale: 'idr') }}
                                </p>
                                @if ($promo['isPercent'] > 0)
                                    <svg class="-translate-x-[1px] -translate-y-[3px] size-[22px] text-danger"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M20.29 8.567c.133.323.334.613.59.85v.002a3.536 3.536 0 0 1 0 5.166 2.442 2.442 0 0 0-.776 1.868 3.534 3.534 0 0 1-3.651 3.653 2.483 2.483 0 0 0-1.87.776 3.537 3.537 0 0 1-5.164 0 2.44 2.44 0 0 0-1.87-.776 3.533 3.533 0 0 1-3.653-3.654 2.44 2.44 0 0 0-.775-1.868 3.537 3.537 0 0 1 0-5.166 2.44 2.44 0 0 0 .775-1.87 3.55 3.55 0 0 1 1.033-2.62 3.594 3.594 0 0 1 2.62-1.032 2.401 2.401 0 0 0 1.87-.775 3.535 3.535 0 0 1 5.165 0 2.444 2.444 0 0 0 1.869.775 3.532 3.532 0 0 1 3.652 3.652c-.012.35.051.697.184 1.02ZM9.927 7.371a1 1 0 1 0 0 2h.01a1 1 0 0 0 0-2h-.01Zm5.889 2.226a1 1 0 0 0-1.414-1.415L8.184 14.4a1 1 0 0 0 1.414 1.414l6.218-6.217Zm-2.79 5.028a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </div>
                        @endif
                    </div>
                    {{-- Price --}}

                    {{-- Summary --}}
                    @if ($detail && $detail->summary)
                        <div class="mt-6 lg:mt-10">
                            <h3 class="sr-only">Summary</h3>

                            <div class="space-y-6">
                                <p class="text-base text-dark/70">{{ $detail->summary }}</p>
                            </div>
                        </div>
                    @endif
                    {{-- Summary --}}

                </div>
                {{-- Product Summary --}}

                {{-- Product Detail --}}
                <div class="pb-4 lg:pb-8 lg:col-span-2 md:mt-8 lg:row-span-2 lg:border-r lg:border-dark/15 lg:pr-8">
                    {{-- Tabs --}}
                    @if (
                        $detail &&
                            ($detail->highlights ||
                                $detail->description ||
                                ($detail->marketplaces && collect($detail->marketplaces)->count() > 0)))
                        <div class="flex flex-row w-full overflow-x-auto h-14 bg-dark/5">
                            {{-- Highlights --}}
                            @if ($detail && $detail->highlights)
                                <button @click="selectedTab = 0" class="px-4 text-sm w-min lg:font-medium lg:text-lg"
                                    :class="{
                                        'text-dark/80': selectedTab != 0,
                                        'border-b-primary text-primary border-b-2': selectedTab == 0,
                                    }">
                                    Highlights
                                </button>
                            @endif
                            {{-- Highlights --}}

                            {{-- Description --}}
                            @if ($detail && $detail->description)
                                <button @click="selectedTab = 1" class="px-4 text-sm w-min lg:font-medium lg:text-lg"
                                    :class="{
                                        'text-dark/80': selectedTab != 1,
                                        'border-b-primary text-primary border-b-2': selectedTab == 1,
                                    }">
                                    Description
                                </button>
                            @endif
                            {{-- Description --}}

                            {{-- Related Marketplaces --}}
                            @if ($detail && $detail->marketplaces && collect($detail->marketplaces)->count() > 0)
                                <button @click="selectedTab = 2"
                                    class="px-4 text-sm max-[360px]::w-min lg:font-medium lg:text-lg"
                                    :class="{
                                        'text-dark/80': selectedTab != 2,
                                        'border-b-primary text-primary border-b-2': selectedTab == 2,
                                    }">
                                    Shopping in Marketplace
                                </button>
                            @endif
                            {{-- Related Marketplaces --}}
                        </div>
                    @endif
                    {{-- Tabs --}}

                    {{-- Highlights Content --}}
                    @if ($detail && $detail->highlights)
                        <div x-show="selectedTab == 0" x-transition:enter="transition transform duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-4">
                            <div class="my-2">
                                <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                                    @foreach ($detail->highlights as $hl)
                                        <li class="text-dark/15"><span class="text-dark/70">{{ $hl }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    {{-- Highlights Content --}}

                    {{-- Description Content --}}
                    @if ($detail && $detail->description)
                        <div x-show="selectedTab == 1" x-transition:enter="transition transform duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-4">
                            <div class="my-2 space-y-6">
                                <p class="text-sm text-dark/70">{{ $detail->description }}</p>
                            </div>
                        </div>
                    @endif
                    {{-- Description Content --}}

                    {{-- Related Marketplace --}}
                    @if ($detail && $detail->description && collect($detail->marketplaces)->count() > 0)
                        <div x-show="selectedTab == 2" x-transition:enter="transition transform duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-4">
                            <div class="flex flex-col gap-2 my-2">
                                @foreach ($detail->marketplaces as $market)
                                    @if (Str::length($market->url) > 0)
                                        <a href="{{ $market->url }}" target="_blank"
                                            class="flex flex-row items-center justify-between gap-2 min-h-10">
                                            {{ $getTitle($market->url) ?? $data->name }}
                                            <span class="flex flex-row gap-1">
                                                <img src="{{ $getFavicon($market->url) }}" class="object-contain"
                                                    alt="{{ $market->name }}">
                                                {{ $market->name }}
                                            </span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    {{-- Related Marketplace --}}
                </div>
                {{-- Product Detail --}}

                {{-- Options --}}
                <div class="lg:row-start-2 lg:col-start-3 lg:col-span-1 lg:row-span-2">
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

                    <form action="/" method="GET" class="mt-0">
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
                                                <input type="radio" name="color-choice"
                                                    value="{{ $color }}"
                                                    @click="selectedColor = '{{ $color }}'"
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
                                    <div class="grid grid-cols-4 gap-3 sm:grid-cols-8 lg:grid-cols-6">
                                        @foreach ($detail->size as $index => $s)
                                            <label
                                                class="relative flex items-center justify-center px-4 py-3 text-sm font-medium uppercase border shadow-sm cursor-pointer text-primary bg-tertiary group hover:bg-quaternary focus:outline-none sm:flex-1 sm:py-4">
                                                <input type="radio" name="size-choice" value="{{ $s }}"
                                                    @click="selectedSize = '{{ $s }}'"
                                                    class="sr-only peer" {{ $index == 0 ? 'checked' : '' }}>
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

                        <div
                            class="flex flex-row w-full h-20 gap-1 px-6 py-4 lg:h-14 max-lg:z-10 bg-tertiary max-lg:fixed max-lg:bottom-0 max-lg:left-0 max-lg:right-0 lg:mt-10 lg:p-0 lg:bg-transparent">
                            <button type="submit"
                                :disabled="(typeof selectedColor === 'string' && selectedColor == '') || (
                                    typeof selectedSize === 'string' && selectedSize == '')"
                                class="flex items-center justify-center w-full px-8 py-2 text-base font-medium border border-transparent cursor-pointer text-tertiary bg-success hover:bg-success/80 focus:outline-none focus:ring-2 focus:ring-success/80 focus:ring-offset-2">Enquire
                                Now</button>
                            <button type="button" @click="favorite = toggleFavorite({{ "'" . $data->slug . "'" }})"
                                class="flex items-center justify-center h-full p-2 bg-transparent border-2 cursor-pointer aspect-square text-danger border-danger hover:text-danger/50 hover:border-danger/50">
                                <svg x-show="favorite" class="aspect-square" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <title>Remove from wishlist</title>
                                    <path
                                        d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
                                </svg>
                                <svg x-show="!favorite" class="aspect-square" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <title>Add to wishlist</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.4"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                {{-- Options --}}
            </div>
            <!-- Product info -->

            @isset($moreItems)
                {{-- {{ dd($moreItems) }} --}}
                <x-layout.horizontal-list title="Complete Your Appearance" :items="$moreItems"></x-layout.horizontal-list>
            @endisset
        </div>
    </div>
</x-layout.layout>
