<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class barangay_id_prev extends Component
{
    protected $position;
    protected $brgyCapt;
    public function __construct($position, $brgyCapt)
    {
        $this->position = $position;
        $this->brgyCapt = $brgyCapt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barangay_id_prev');
    }
}
