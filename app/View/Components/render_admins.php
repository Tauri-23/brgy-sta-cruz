<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class render_admins extends Component
{
    public $admins;

    public function __construct($admins)
    {
        $this->admins = $admins;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.render_admins');
    }
}
