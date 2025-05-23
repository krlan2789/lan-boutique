<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDialog extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $message,
        public string $btnLabel,
        public bool $autoShow = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.modal-dialog');
    }
}
