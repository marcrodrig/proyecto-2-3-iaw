<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardTurnoCrearEditar extends Component
{

    public $turno;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($turno = '')
    {
        $this->turno = $turno;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-turno-crear-editar');
    }
}
