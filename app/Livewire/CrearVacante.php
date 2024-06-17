<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{
    public function render()
    {
        //Consulta a la BD
        $salarios = Salario::all();
        
        return view('livewire.crear-vacante', [
            'salarios' => $salarios
        ]);
    }
}