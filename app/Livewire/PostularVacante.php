<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => ['required','mimes:pdf'],
    ];

    public function mount(Vacante $vacante)
    {
        //dd($vacante);
        $this->vacante = $vacante;
    }
    
    public function inscribirme()
    {
        $datos = $this->validate();

        //Almacenar CV
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);//De esta manera reescribimos el cv
        //Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //Crear notificación y enviar Email

        //Mostrar al usuario mensaje de inscripción correcta
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
