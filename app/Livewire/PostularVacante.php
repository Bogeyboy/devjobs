<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    
    public $cv;

    protected $rules = [
        'cv' => ['required','mimes:pdf'],
    ];
    
    public function inscribirme()
    {
        $datos = $this->validate();

        //Almacenar CV
        $cv = $this->cv->store('public/cv');

        $datos['cv'] = str_replace('public/cv/', '', $cv);//De esta manera reescribimos el cv

        //Crear la vacante

        //Crear notificación y enviar Email

        //Mostrar al usuario mensaje de inscripción correcta
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
