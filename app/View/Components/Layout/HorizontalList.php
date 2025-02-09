<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class HorizontalList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public array|Collection|null $items = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.horizontal-list');
    }
}
