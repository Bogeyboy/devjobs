<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
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
        
        //Mostrar al usuario mensaje de inscripción correcta
        session()->flash('mensaje','Se envió correctamente tu información, mucha suerte');
        
        //Crear notificación y enviar Email
        $this->vacante->reclutador->notify(
            new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id)
        );
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
