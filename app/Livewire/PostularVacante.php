<?php

namespace App\Livewire;

use Livewire\Component;

class PostularVacante extends Component
{
    public $cv;

    protected $rules = [
        'cv' => ['required','mimes:pdf'],
    ];
    
    public function inscribirme()
    {
        $datos = $this->validate();

        //Almacenar CV en Disco

        //Crear la vacante

        //Crear notificación y enviar Email

        //Mostrar al usuario mensaje de inscripción correcta
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
