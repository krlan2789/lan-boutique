{{-- Product grid --}}
@if (isset($items) && count($items) > 0)
    <!-- List products... -->
    <div
        class="grid grid-cols-1 px-6 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-10 xl:gap-y-14">
        @foreach ($items as $item)
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
