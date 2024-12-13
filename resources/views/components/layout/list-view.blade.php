<x-layout.layout :$title>
    <div class="mx-auto bg-tertiary">
        <div class="container flex flex-col min-h-screen pt-0 pb-12 mx-auto mt-0 md:pb-16">
            @switch($viewType)
                @case('filter')
                    <x-layout.list-filter class="mt-[88px] px-6" :$title :$results :$filters></x-layout.list-filter>
                    {{-- {{ $filters['tags'] }} --}}
                @break

                @case('new-arrival')
                    <div class="w-full h-screen pt-16 lg:px-6">
                        <div class="relative w-full h-full overflow-hidden bg-dark/20">
                            <div
                                class="absolute overflow-hidden group origin-bottom-left bottom-0 left-0 w-[66.6%] text-dark top-0 h-full bg-tertiary trapezoid-left flex flex-col justify-between items-start scale-x-100 transition-all duration-300 hover:scale-x-[1.0075] hover:z-10 hover:bg-dark/5">
                                <div class="relative w-full h-full">
                                    {{-- Background Image --}}
                                    <div style="background-image: url(/img/products/product.64-removebg-preview.png)"
                                        class="absolute bg-left-bottom bg-contain bg-no-repeat bottom-0 right-0 top-0 w-full h-[70%] origin-top-right md:origin-top-left lg:h-[80%] group-hover:scale-125"
                                        alt="MEN">
                                    </div>
                                    {{-- Background Image --}}
                                    <div
                                        class="absolute flex flex-col-reverse gap-4 py-32 lg:py-24 items-start justify-start w-full h-full bg-dark/0 scale-x-100 transition-all duration-300 group-hover:scale-x-[1.0075] group-hover:bg-dark/40">
                                        <h2
                                            class="text-2xl font-bold text-center w-36 md:w-44 md:text-3xl xl:w-56 xl:text-4xl text-tertiary">
                                            MEN
                                        </h2>
                                        <a href="{{ $menu['new-arrival']['route'] }}/men"
                                            class="flex items-center justify-center gap-1 text-sm w-36 md:w-44 md:text-lg xl:w-60 xl:py-4 xl:text-2xl btn-main">
                                            See products
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"
                                                viewBox="0 0 24 24" style="transform: ;msFilter:;">
                                                <path
                                                    d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="absolute overflow-hidden group origin-bottom-right bottom-0 -right-px w-[66.6%] text-dark top-0 h-full bg-tertiary trapezoid-right flex flex-col-reverse justify-between items-end scale-x-100 transition-all duration-300 hover:scale-x-[1.0075] hover:z-10 hover:bg-dark/5">
                                <div class="relative w-full h-full">
                                    {{-- Background Image --}}
                                    <div style="background-image: url(/img/products/product.35-removebg-preview.png)"
                                        class="absolute bg-right-bottom bg-contain bg-no-repeat bottom-0 left-0 w-full h-[84%] top-[16%] md:h-[70%] md:top-[30%] origin-bottom-left md:origin-bottom-right group-hover:scale-125"
                                        alt="WOMEN">
                                    </div>
                                    {{-- Background Image --}}
                                    <div
                                        class="absolute flex flex-col gap-4 py-32 lg:py-24 items-end justify-start w-full h-full bg-dark/0 scale-x-100 transition-all duration-300 group-hover:scale-x-[1.0075] group-hover:bg-dark/40">
                                        <h2
                                            class="text-2xl font-bold text-center w-36 md:w-44 md:text-3xl xl:w-56 xl:text-4xl text-tertiary">
                                            WOMEN
                                        </h2>
                                        <a href="{{ $menu['new-arrival']['route'] }}/women"
                                            class="flex items-center justify-center gap-1 text-sm w-36 md:w-44 md:text-lg xl:w-60 xl:py-4 xl:text-2xl btn-main">
                                            See products
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor"
                                                viewBox="0 0 24 24" style="transform: ;msFilter:;">
                                                <path
                                                    d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (isset($results) && $results['items'] && count($results['items']) > 0)
                        <div class="w-full h-auto">
                            <div class="px-0 py-16 lg:px-6 lg:mx-6 bg-quaternary">
                                <h1
                                    class="flex justify-start px-8 pb-2 text-xl font-semibold text-center lg:px-12 lg:text-3xl text-dark">
                                    {{ $title }}
                                </h1>
                                <p class="flex flex-row px-8 pb-6 text-sm lg:px-12 text-dark/80">
                                    Our new products for this year
                                    <a href="{{ $menu['new-arrival']['route'] }}/all"
                                        class="flex flex-row items-center justify-center gap-2 simple-link">
                                        <svg class="w-8 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M34 14H5m29 0-4 4m4-4-4-4" />
                                        </svg>
                                        View all
                                    </a>
                                </p>
                                <x-layout.horizontal-list class="lg:mx-6" :items="$results['items']->take(8)"></x-layout.horizontal-list>
                            </div>
                        </div>
                    @endif
                @break

                @case('new-arrival-category')
                    <div class="w-full h-auto pt-12 mt-16 -mb-12 lg:px-6">
                        <h1 class="flex justify-center text-xl font-semibold text-center lg:text-3xl text-dark">
                            {{ $title }}
                        </h1>
                        @if (isset($results) && $results['items'] && count($results['items']) > 0)
                            <p class="flex justify-center pt-4 text-sm text-center lg:text-base">{{ count($results['items']) }}
                                Products</p>
                        @endif
                    </div>
                @case('simple')
                    {{-- Product grid --}}
                    @if (isset($results) && $results['items'] && count($results['items']) > 0)
                        <!-- List products... -->
                        <div
                            class="grid grid-cols-1 px-6 mt-24 md:mt-28 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-10 xl:gap-y-14">
                            @foreach ($results['items'] as $item)
                                <x-layout.card-item :subtitle="$item['name']" :title="$item['variantName']" :price="$item['price']" :image-url="$item['imageUrl']"
                                    :url="$item['url']" :colors="$item['colors']" :promo-price="$item['promoPrice']"></x-layout.card-item>
                            @endforeach
                        </div>
                        <!-- List products... -->
                    @else
                        <!-- No product... -->
                        <div class="flex items-center justify-center flex-1 px-6 text-xl text-dark">
                            No products found
                        </div>
                        <!-- No product... -->
                    @endif
                    {{-- Product grid --}}
                @break

                @default
            @endswitch
        </div>
    </div>
</x-layout.layout>
