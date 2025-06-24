<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToolBar extends Component
{
    /**
     * Create a new component instance.
     */
    public $action;

    public function __construct($action)
    {
        $this->action = $action;
    
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tool-bar');
    }
}
