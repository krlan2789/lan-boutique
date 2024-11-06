<!-- component -->
@if (isset($items) && count($items) > 0)
    <div {{ isset($attributes) ? $attributes->merge(['class' => 'relative flex flex-col px-6']) : 'class="relative flex flex-col px-6 m-auto bg-tertiary"' }}
        x-data="scrollComponent()">
        @if (isset($title) && Str::length($title))
            <h1 class="flex justify-center py-5 text-xl font-medium text-center text-dark">
                {{ $title }}
            </h1>
        @endif
        <div class="flex overflow-x-scroll custom-scrollable-x">
            <div class="flex gap-4 mx-4 flex-nowrap">
                @foreach ($items as $item)
                    <x-layout.card-item class="min-w-80 md:min-w-64" :subtitle="$item['name']" :title="$item['variantName']"
                        :price="$item['price']" :image-url="$item['imageUrl']" :url="$item['url']" :colors="$item['colors']"
                        :promo-price="$item['promoPrice']"></x-layout.card-item>
                @endforeach
            </div>
        </div>

        <button @click="prev" class="absolute px-2 py-4 text-white left-1 top-[40%] bg-primary hover:bg-primary/90">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <button @click="next" class="absolute px-2 py-4 text-white right-1 top-[40%] bg-primary hover:bg-primary/90">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
@endif

<script>
    function scrollComponent() {
        return {
            prev() {
                document.querySelector('.overflow-x-scroll').scrollBy({
                    left: -272,
                    behavior: 'smooth'
                });
            },
            next() {
                document.querySelector('.overflow-x-scroll').scrollBy({
                    left: 272,
                    behavior: 'smooth'
                });
            }
        }
    }
</script>
