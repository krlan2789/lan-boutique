<div class="relative group">
    <div
        class="w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80">
        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-01-related-product-01.jpg"
            alt="Front of men&#039;s Basic Tee in black."
            class="object-cover object-center w-full h-full lg:h-full lg:w-full">
    </div>
    <div class="flex justify-between mt-4">
        <div>
            <h3 class="text-sm text-gray-700">
                <a href="/product/{{ $code }}">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $name }}
                </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
        </div>
        <p class="text-sm font-medium text-gray-900">${{ $price }}</p>
    </div>
</div>
