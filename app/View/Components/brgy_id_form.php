<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class brgy_id_form extends Component
{
    public $resident;
    public function __construct($resident)
    {
        $this->resident = $resident;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brgy_id_form');
    }
}
