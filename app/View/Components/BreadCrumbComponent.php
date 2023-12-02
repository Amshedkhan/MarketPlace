<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumbComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $modal, $modalId, $modalType,$pageUrl;
    public function __construct($modal = false, $modalType = null, $modalId = null,$pageUrl=null)
    {
        //
        $this->modal = $modal;
        $this->modalId = $modalId;
        $this->modalType = $modalType;
        $this->pageUrl =$pageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bread-crumb-component');
    }
}
