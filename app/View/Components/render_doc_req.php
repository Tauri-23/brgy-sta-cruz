<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class render_doc_req extends Component
{
    public $docReq;
    public $docReqBrgyId;
    public $mode;
    public $user;
    public function __construct($docReq, $docReqBrgyId, $mode, $user)
    {
        $this->docReq = $docReq;
        $this->docReqBrgyId = $docReqBrgyId;
        $this->mode = $mode;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.render_doc_req');
    }
}
