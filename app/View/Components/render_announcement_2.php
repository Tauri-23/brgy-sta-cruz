<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class render_announcement_2 extends Component
{
    public $announcement;
    public $userType;

    public function __construct($announcement, $userType)
    {
        $this->announcement = $announcement;
        $this->userType =$userType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.render_announcement_2');
    }
}
