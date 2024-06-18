<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    public $message;//Esta es la variable del mensaje que va a renderizar
    
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
