<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OffreGroup extends Component
{
    public $offre;

    /**
     * Create a new component instance.
     *
     * @param mixed $offre
     * @return void
     */
    public function __construct($offre)
    {
        $this->offre = $offre;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offre-group');
    }
}
