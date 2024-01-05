<?php

namespace App\Livewire\Apps\AD\Subcategorias;

use App\Models\AdCategorias;
use App\Models\AdSubCategorias;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Component;

class SubcategoriasEdit extends Component {

    #[Locked]
    public AdCategorias $categoria;

    #[Locked]
    public AdSubCategorias $subcategoria;

    public $nombre, $tiempoRespuesta;

    protected array $rules = [
        'nombre'          => 'required|string',
        'tiempoRespuesta' => 'required|numeric',
    ];

    protected array $validationAttributes = [
        'tiempoRespuesta' => 'tiempo máximo de respuesta',
    ];

    public function mount(AdCategorias $categoria, AdSubCategorias $subcategoria) {
        $this->categoria = $categoria;
        $this->subcategoria = $subcategoria;

        $this->nombre = $subcategoria->nombre;
        $this->tiempoRespuesta = $subcategoria->tiempo_respuesta;
    }

    public function submit() {

        $this->validate($this->rules, [], $this->validationAttributes);

        try {
            
            $data = $this->subcategoria;
            $data->nombre           = $this->nombre;
            $data->tiempo_respuesta = $this->tiempoRespuesta;
            $data->save();

            toastr()->success('La subcategoría ha sido editada correctamente.', 'Subcategorías', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.subcategorias.index', $this->categoria->id);
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.subcategorias.subcategorias-edit');
    }

}
