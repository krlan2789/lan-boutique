<x-layout.layout>
    <div class="mx-auto bg-tertiary">
        <div class="container flex flex-col min-h-screen px-6 pb-12 mx-auto pt-28 md:pb-16 md:pt-32">
            <h2 class="text-2xl tracking-tight text-primary">Category: <strong>{{ $title }}</strong></h2>

            @if ($items && count($items) > 0)
                <!-- List products... -->
                <div class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($items as $item)
                        <x-layout.card-item :name="$item->name" :code="$item->code" :price="$item->price" :short-desc="$item->shortDesc"
                            :colors="$item->colors"></x-layout.card-item>
                    @endforeach
                </div>
                <!-- List products... -->
            @else
                <!-- No product... -->
                <div class="flex items-center justify-center flex-1 text-xl text-primary">
                    No products found
                </div>
                <!-- No product... -->
            @endif
        </div>
    </div>
</x-layout.layout>
