<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $subtitle,
        public string $url,
        public int $price = 0,
        public int $promoPrice = 0,
        public string $imageUrl = '',
        public string $shortDesc = '',
        public array|null $colors = [],
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.card-item');
    }
}
