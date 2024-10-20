<?php

namespace App\View\Components\Layout;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $code,
        public int $price = 0,
        public string $shortDesc = '',
        public array $colors = [],
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
