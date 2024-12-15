<div
    {{ isset($attributes) ? $attributes->merge(['class' => 'relative group bg-transparent']) : 'class="relative bg-transparent group"' }}>
    @if (isset($imageUrl) && is_array($imageUrl) && count($imageUrl) > 0)
        <div class="w-full h-auto overflow-hidden aspect-h-1 aspect-w-1 max-h-[340px] lg:aspect-none">
            <div x-data="{ imageIndex: 0 }"
                class="relative items-center justify-center w-full h-auto overflow-hidden bg-tertiary">

                <div class="flex transition-transform duration-500"
                    :style="{ transform: `translateX(-${imageIndex * 100}%)` }">
                    @foreach ($imageUrl as $img)
                        <div class="flex-shrink-0 w-full">
                            <img src="{{ $img }}" class="object-cover object-center size-full">
                        </div>
                    @endforeach
                </div>

                @if (count($imageUrl) > 0)
                    <button @click="imageIndex = (imageIndex <= 0 ? {{ count($imageUrl) - 1 }} : imageIndex - 1)"
                        class="absolute z-10 md:hidden group-hover:block left-0 px-1 py-2 text-white top-[45%] bg-primary hover:bg-primary/90">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <button @click="imageIndex = (imageIndex < {{ count($imageUrl) - 1 }} ? imageIndex + 1 : 0)"
                        class="absolute z-10 md:hidden group-hover:block right-0 px-1 py-2 text-white top-[45%] bg-primary hover:bg-primary/90">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    @endif
    <div class="flex justify-between mt-3 mb-0">
        <div class="flex flex-col w-full gap-1">
            @if ($subtitle != null && Str::length($subtitle) > 0)
                <p class="text-xs italic font-light text-left text-secondary">{{ $subtitle }}</p>
            @endif

            @if ($title != null && Str::length($title) > 0)
                <h3 class="text-xl font-bold text-left text-dark">
                    <a href="{{ $url }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $title }}
                    </a>
                </h3>
            @endif

            @if ($colors != null && gettype($colors) == 'array' && collect($colors)->count() > 0)
                <ul role="list" class="flex justify-start w-full gap-2 py-1">
                    @foreach ($colors as $color)
                        <li class="rounded-full size-4 border-dark/25 border-[1px]" title=""
                            style="background-color: {{ $color }};">
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- {!! '(' . gettype($price) . ')' !!}
            {!! '(' . gettype($promoPrice) . ')' !!}
            {!! dd($promoPrice) !!} --}}

            @if ($price > 0 && gettype($price) == 'integer')
                @if ($promoPrice > 0 && gettype($price) == 'integer')
                    <p class="text-xl font-bold text-left text-danger">
                        Rp {{ Number::format(intval($promoPrice), locale: 'idr') }}
                    </p>
                    <p
                        class="text-base font-normal text-left line-through text-dark/50 decoration-slice decoration-dark/25">
                        Rp {{ Number::format(intval($price), locale: 'idr') }}
                    </p>
                @else
                    <p class="text-xl font-bold text-left text-dark">
                        Rp {{ Number::format(intval($price), locale: 'idr') }}
                    </p>
                @endif
            @endif
        </div>
    </div>
</div>
