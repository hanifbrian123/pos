<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $message,
        public string $noDesc,
        public string $yesDesc,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.alert');
    }
}
