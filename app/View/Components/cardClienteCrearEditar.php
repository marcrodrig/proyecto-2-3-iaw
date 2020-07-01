<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardClienteCrearEditar extends Component
{
    
    public $cliente;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cliente = '')
    {
        $this->cliente = $cliente;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-cliente-crear-editar');
    }
}
