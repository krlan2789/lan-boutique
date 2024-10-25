<div class="relative group bg-tertiary">
    <div class="w-full overflow-hidden aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80">
        <img src="{{ $imageUrl }}" alt="{{ $title }}"
            class="object-cover object-center w-full h-full lg:h-full lg:w-full">
    </div>
    <div class="flex justify-between mt-2">
        <div class="flex flex-col w-full gap-1">
            @if ($subtitle != null && Str::length($subtitle) > 0)
                <p class="text-xs font-medium text-center text-secondary">{{ $subtitle }}</p>
            @endif

            @if ($title != null && Str::length($title) > 0)
                <h3 class="text-lg font-semibold text-center text-primary">
                    <a href="{{ $url }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $title }}
                    </a>
                </h3>
            @endif

            @if ($colors != null && gettype($colors) == 'array' && collect($colors)->count() > 0)
                <ul role="list" class="flex justify-center w-full gap-2 py-1">
                    @foreach ($colors as $color)
                        <li class="rounded-full size-4 border-dark/25 border-[1px]" title=""
                            style="background-color: {{ $color }};">
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- {!! gettype($price) . '::' !!}
            {!! dd($price) !!} --}}

            @if ($price > 0)
                <p class="text-lg font-medium text-center text-dark">
                    Rp {{ Number::format(intval($price), locale: 'idr') }}
                </p>
            @endif
        </div>
    </div>
</div>
