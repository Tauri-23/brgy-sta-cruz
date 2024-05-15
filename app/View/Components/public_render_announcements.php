<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class public_render_announcements extends Component
{
    public $announcement;
    public function __construct($announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.public_render_announcements');
    }
}
