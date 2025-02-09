<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ListFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public array|Collection|null $results,
        public array|Collection|null $filters,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.list-filter');
    }
}
