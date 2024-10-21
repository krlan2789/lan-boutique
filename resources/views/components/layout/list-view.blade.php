<x-layout.layout>
    <div class="mx-auto bg-tertiary">
        <div class="container flex flex-col min-h-screen px-6 pt-24 pb-12 mx-auto md:pb-16 md:pt-28">
            {{-- <div class="flex flex-col gap-2 my-4">
                <h2 class="text-2xl tracking-tight text-primary">Category: <strong>{{ $title }}</strong></h2>
                @if ($items && count($items) > 0)
                    <p class="text-sm text-primary/50">{{ 'Products 1 of ' . count($items) }}</p>
                @endif
            </div>
            @if ($items && count($items) > 0)
                <!-- List products... -->
                <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($items as $item)
                        <x-layout.card-item :subtitle="$item['name']" :title="$item['variantName']" :price="0 + $item['price']" :url="$item['url']"
                            :colors="$item['colors']" :short-desc="Str::limit('' . $item['desc'], 32)"></x-layout.card-item>
                    @endforeach
                </div>
                <!-- List products... -->
            @else
                <!-- No product... -->
                <div class="flex items-center justify-center flex-1 text-xl text-primary">
                    No products found
                </div>
                <!-- No product... -->
            @endif --}}

            <x-layout.list-filter :$items :$title></x-layout.list-filter>
        </div>
    </div>
</x-layout.layout>
