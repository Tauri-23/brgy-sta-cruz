<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin_render_residents extends Component
{
    public $residents;
    public function __construct($residents)
    {
        $this->residents = $residents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin_render_residents');
    }
}
