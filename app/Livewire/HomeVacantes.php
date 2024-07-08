<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacantes extends Component
{
    /* use WithPagination;

    public $termino;
    public $categoria;
    public $salario;
    
    protected $listeners = ['terminosBusqueda' => 'buscar']; */

    use WithPagination;
    public $termino;
    public $categoria;
    public $salario;
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    protected $queryString = ['termino', 'categoria', 'salario'];
    
    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    
    public function render()
    {
        //dd($this->termino);
        //$vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function($query)
        {
            $query->where('titulo','LIKE',"%". $this->termino . "%");   //El % es el carácter comodín para las búsquedas
        })
        ->when($this->termino, function ($query) {
            $query->orWhere('empresa','LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query)
        {
            $query->where('categoria_id',$this->categoria);
        })
        ->when($this->salario, function ($query) {
            $query->where('salario_id', $this->salario);
        })
        ->whereDate('ultimo_dia','>',now())
        ->paginate(10);

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
