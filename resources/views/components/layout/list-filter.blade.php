<script scoped>
    function getData() {
        return {
            isMobileFilterOpen: false,
            isFilterTagsOpen: {{ request()->query('tags', '') != '' ? 'true' : 'false' }},
            isFilterSizeOpen: {{ request()->query('size', '') != '' ? 'true' : 'false' }},
            isFilterColorsOpen: {{ request()->query('colors', '') != '' ? 'true' : 'false' }},
            isMobileFilterTagsOpen: {{ request()->query('tags', '') != '' ? 'true' : 'false' }},
            isMobileFilterSizeOpen: {{ request()->query('size', '') != '' ? 'true' : 'false' }},
            isMobileFilterColorsOpen: {{ request()->query('colors', '') != '' ? 'true' : 'false' }},
            toWithParam(newParams, reset = false, url = null) {
                let uri = new URL(url ?? window.location.href);
                Object.keys(newParams).forEach(key => {
                    let current = uri.searchParams.get(key) ? uri.searchParams.get(key).split(',') : [];
                    let newValue = newParams[key];

                    if (reset) {
                        current = [newValue];
                    } else if (current.includes(newValue)) {
                        current = current.filter(value => value !== newValue);
                    } else {
                        current.push(newValue);
                    }

                    if (current.length > 0) {
                        uri.searchParams.set(key, current.join(','));
                    } else {
                        uri.searchParams.delete(key);
                    }
                });
                let newQueryString = '';
                uri.searchParams.forEach((value, key) => {
                    newQueryString += `${key}=${value}&`;
                });
                newQueryString = newQueryString.slice(0, -1); // Remove the trailing '&'
                uri.search = newQueryString;
                window.location.href = uri.toString();
            },
        };
    }
</script>

{{-- {{ dd($filters) }} --}}
<div {{ isset($attributes) ? $attributes->merge(['class' => 'bg-tertiary']) : 'class="bg-tertiary"' }}
    x-data="getData()">
    <div>

        {{-- Mobile filter dialog. Off-canvas filters for mobile, show/hide based on off-canvas filters state. --}}
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div x-show="isMobileFilterOpen" class="fixed inset-0 bg-opacity-25 bg-dark" aria-hidden="true"></div>

            <div class="fixed inset-0 z-40 flex" x-show="isMobileFilterOpen"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

                {{-- Mobile screen Filter --}}
                <div @click.outside="isMobileFilterOpen = false"
                    class="relative flex flex-col w-full h-full max-w-xs py-4 pb-12 ml-auto overflow-y-auto shadow-xl bg-tertiary">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-dark">Filters</h2>
                        <button type="button" @click="isMobileFilterOpen = false"
                            class="flex items-center justify-center w-10 h-10 p-2 -mr-2 rounded-md text-dark/40 bg-tertiary">
                            <span class="sr-only">Close menu</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4 border-t border-quaternary">
                        {{-- Filter : Tags --}}
                        @if (isset($filters) && isset($filters['tags']) && count($filters['tags']) > 0)
                            <div class="px-4 py-6 border-t border-quaternary">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="isMobileFilterTagsOpen = !isMobileFilterTagsOpen"
                                        class="flex items-center justify-between w-full px-2 py-3 text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-mobile-1" aria-expanded="false">
                                        <span class="font-medium text-dark">Category</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isMobileFilterTagsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isMobileFilterTagsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="isMobileFilterTagsOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-mobile-1">
                                    <div class="space-y-6">
                                        @foreach ($filters['tags'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-mobile-tags-{{ $index }}" name="tags[]"
                                                    @click='toWithParam(@json(['tags' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('tags', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-mobile-tags-{{ $index }}"
                                                    class="flex-1 min-w-0 ml-3 text-dark/50">{{ ucfirst($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Tags --}}

                        {{-- Filter : Size --}}
                        @if (isset($filters) && isset($filters['size']) && count($filters['size']) > 0)
                            <div class="px-4 py-6 border-t border-quaternary">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="isMobileFilterSizeOpen = !isMobileFilterSizeOpen"
                                        class="flex items-center justify-between w-full px-2 py-3 text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-mobile-2" aria-expanded="false">
                                        <span class="font-medium text-dark">Size</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isMobileFilterSizeOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isMobileFilterSizeOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="isMobileFilterSizeOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-mobile-2">
                                    <div class="space-y-6">
                                        @foreach ($filters['size'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-{{ $index }}" name="size[]"
                                                    @click='toWithParam(@json(['size' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('size', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-mobile-size-{{ $index }}"
                                                    class="flex-1 min-w-0 ml-3 text-dark/50">{{ Str::upper($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Size --}}

                        {{-- Filter : Colors --}}
                        @if (isset($filters) && isset($filters['colors']) && count($filters['colors']) > 0)
                            <div class="px-4 py-6 border-t border-quaternary">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        @click="isMobileFilterColorsOpen = !isMobileFilterColorsOpen"
                                        class="flex items-center justify-between w-full px-2 py-3 text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-dark">Color</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isMobileFilterColorsOpen" class="w-5 h-5"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isMobileFilterColorsOpen" class="w-5 h-5"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="isMobileFilterColorsOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        @foreach ($filters['size'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-{{ $index }}" name="colors[]"
                                                    @click='toWithParam(@json(['colors' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('colors', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-mobile-color-{{ $index }}"
                                                    class="flex-1 min-w-0 ml-3 text-dark/50">{{ ucfirst($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Colors --}}
                    </form>
                    <!-- Filters -->
                </div>
                {{-- Mobile screen Filter --}}
            </div>
        </div>
        {{-- Mobile filter dialog. Off-canvas filters for mobile, show/hide based on off-canvas filters state. --}}

        <main class="mx-auto">
            <div class="flex items-baseline justify-between pb-6 border-b border-quaternary">
                <div class="flex flex-col gap-2 text-dark">
                    <h2 class="flex flex-row gap-2 text-2xl tracking-tight md:text-3xl">
                        <span class="hidden sm:block">Category:</span><strong>{{ $title }}</strong>
                    </h2>
                    {{-- @if (isset($results) && $results['items'] && count($results['items']) > 0)
                        <p class="text-sm text-dark/50">{{ count($results['variants']->items()) }} products found</p>
                    @endif --}}
                </div>

                <div class="flex items-center">
                    {{-- Filter Sort --}}
                    <div class="relative inline-block text-left" x-data="{ isSortOptionsOpen: false }">
                        <div>
                            <button type="button" @click="isSortOptionsOpen = !isSortOptionsOpen"
                                class="inline-flex justify-center text-sm font-medium text-dark group hover:text-dark/80"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <svg class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-dark/70 group-hover:text-dark/60"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div x-cloak x-show="isSortOptionsOpen" @click.outside="isSortOptionsOpen = false"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 w-40 mt-2 origin-top-right rounded-md shadow-2xl bg-tertiary ring-1 ring-dark ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                            <div class="py-1" role="none">
                                <button @click="toWithParam({ sort: 'latest' }, true)"
                                    class="block px-4 py-2 text-sm
                                    @if (request()->get('sort') == 'latest' || !request()->has('sort')) font-medium text-dark
                                    @else text-dark/50 @endif"
                                    role="menuitem" tabindex="-1" id="menu-item-2">Newest</button>
                                <button @click="toWithParam({ sort: 'popular' }, true)"
                                    class="block px-4 py-2 text-sm
                                    @if (request()->get('sort') == 'popular') font-medium text-dark
                                    @else text-dark/50 @endif"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</button>
                                <button @click="toWithParam({ sort: 'rating' }, true)"
                                    class="block px-4 py-2 text-sm
                                    @if (request()->get('sort') == 'rating') font-medium text-dark
                                    @else text-dark/50 @endif"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</button>
                                <button @click="toWithParam({ sort: 'price-asc' }, true)"
                                    class="block px-4 py-2 text-sm
                                    @if (request()->get('sort') == 'price-asc') font-medium text-dark
                                    @else text-dark/50 @endif"
                                    role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</button>
                                <button @click="toWithParam({ sort: 'price-desc' }, true)"
                                    class="block px-4 py-2 text-sm
                                    @if (request()->get('sort') == 'price-desc') font-medium text-dark
                                    @else text-dark/50 @endif"
                                    role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</button>
                            </div>
                        </div>
                    </div>
                    {{-- Filter Sort --}}

                    {{-- Mobile Filter Button --}}
                    <button type="button" @click="isMobileFilterOpen = !isMobileFilterOpen"
                        class="ml-4 text-dark/70 hover:text-dark/60 size-6 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                            viewBox="0 0 24 24"class="fill-current" style="transform: ;msFilter:;">
                            <path
                                d="M21 3H5a1 1 0 0 0-1 1v2.59c0 .523.213 1.037.583 1.407L10 13.414V21a1.001 1.001 0 0 0 1.447.895l4-2c.339-.17.553-.516.553-.895v-5.586l5.417-5.417c.37-.37.583-.884.583-1.407V4a1 1 0 0 0-1-1zm-6.707 9.293A.996.996 0 0 0 14 13v5.382l-2 1V13a.996.996 0 0 0-.293-.707L6 6.59V5h14.001l.002 1.583-5.71 5.71z">
                            </path>
                        </svg>
                    </button>
                    {{-- Mobile Filter Button --}}
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-5">
                    <!-- Wide screen Filters -->
                    <form class="hidden lg:block">
                        {{-- Filter : Tags --}}
                        @if (isset($filters) && isset($filters['tags']) && count($filters['tags']) > 0)
                            <div class="py-6 border-b border-quaternary">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="isFilterTagsOpen = !isFilterTagsOpen"
                                        class="flex items-center justify-between w-full py-3 text-sm text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-dark">Category</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isFilterTagsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isFilterTagsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="isFilterTagsOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-1">
                                    <div class="space-y-4 max-h-[60vh] overflow-y-auto">
                                        @foreach ($filters['tags'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-tags-{{ $index }}" name="tags[]"
                                                    @click='toWithParam(@json(['tags' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('tags', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-tags-{{ $index }}"
                                                    class="ml-3 text-sm text-gray-600">{{ ucfirst($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Tags --}}

                        {{-- Filter : Size --}}
                        @if (isset($filters) && isset($filters['size']) && count($filters['size']) > 0)
                            <div class="py-6 border-b border-quaternary">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="isFilterSizeOpen = !isFilterSizeOpen"
                                        class="flex items-center justify-between w-full py-3 text-sm text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-2" aria-expanded="false">
                                        <span class="font-medium text-dark">Size</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isFilterSizeOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isFilterSizeOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-cloak x-show="isFilterSizeOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-2">
                                    <div class="space-y-4 max-h-[60vh] overflow-y-auto">
                                        @foreach ($filters['size'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-size-{{ $index }}" name="size[]"
                                                    @click='toWithParam(@json(['size' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('size', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-size-{{ $index }}"
                                                    class="ml-3 text-sm text-gray-600">{{ Str::upper($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Size --}}

                        {{-- Filter : Colors --}}
                        @if (isset($filters) && isset($filters['colors']) && count($filters['colors']) > 0)
                            <div class="py-6 border-b border-quaternary">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="isFilterColorsOpen = !isFilterColorsOpen"
                                        class="flex items-center justify-between w-full py-3 text-sm text-dark/40 bg-tertiary hover:text-dark/50"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="font-medium text-dark">Color</span>
                                        <span class="flex items-center ml-6">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg x-show="!isFilterColorsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Expand icon, show/hide based on section open state. -->

                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg x-show="isFilterColorsOpen" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                        </span>
                                    </button>
                                    <!-- Expand/collapse section button -->
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div x-cloak x-show="isFilterColorsOpen"
                                    x-transition:enter="transition origin-top ease-out duration-300 transform"
                                    x-transition:enter-start="scale-y-95" x-transition:enter-end="scale-y-100"
                                    x-transition:leave="transition origin-top ease-in duration-75 transform"
                                    x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-95"
                                    class="pt-6" id="filter-section-0">
                                    <div class="space-y-4 max-h-[60vh] overflow-y-auto">
                                        @foreach ($filters['colors'] as $index => $value)
                                            <div class="flex items-center">
                                                <input id="filter-color-{{ $index }}" name="colors[]"
                                                    @click='toWithParam(@json(['colors' => $value]))'
                                                    value="{{ $value }}" type="checkbox"
                                                    {{ in_array($value, explode(',', '' . request()->query('colors', ''))) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded text-secondary border-quaternary focus:ring-secondary">
                                                <label for="filter-color-{{ $index }}"
                                                    class="ml-3 text-sm text-gray-600">{{ ucfirst($value) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Filter section, show/hide based on section state. -->
                            </div>
                        @endif
                        {{-- Filter : Colors --}}
                    </form>
                    <!-- Wide screen Filters -->

                    {{-- Product grid --}}
                    <div class="col-span-5 lg:col-span-4">
                        @if (isset($results) && $results['items'] && count($results['items']) > 0)
                            <!-- List products... -->
                            <div
                                class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 xl:gap-x-8">
                                @foreach ($results['items'] as $item)
                                    <x-layout.card-item :subtitle="$item['name']" :title="$item['variantName']" :price="$item['price']"
                                        :image-url="$item['imageUrl']" :url="$item['url']" :colors="$item['colors']"
                                        :promo-price="$item['promoPrice']"></x-layout.card-item>
                                @endforeach
                            </div>
                            <!-- List products... -->
                        @else
                            <!-- No product... -->
                            <div class="flex items-center justify-center flex-1 text-xl text-dark">
                                No products found
                            </div>
                            <!-- No product... -->
                        @endif
                    </div>
                    {{-- Product grid --}}

                    {{-- Pagination --}}
                    @if (isset($results) && $results['variants'])
                        <div class="hidden lg:block"></div>
                        <div class="justify-end col-span-5 lg:col-span-4">
                            {{ $results['variants']->links() }}
                        </div>
                    @endif
                    {{-- Pagination --}}
                </div>
            </section>
        </main>
    </div>
</div>
