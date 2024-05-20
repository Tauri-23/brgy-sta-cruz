<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $navType;
    public $activeLink;
    public $adminType;

    public $pfp;
    public function __construct($navType, $activeLink, $pfp)
    {
        $this->navType = $navType;
        $this->activeLink = $activeLink;
        $this->pfp = $pfp;
        $this->adminType = session('logged_Admin_Type') == null ? "null" : session('logged_Admin_Type');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
