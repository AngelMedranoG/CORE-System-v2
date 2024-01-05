<?php

namespace App\Livewire\Apps\AD\Subcategorias;

use App\Models\AdCategorias;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Component;

class SubcategoriasEdit extends Component {

    #[Locked]
    public AdCategorias $categoria;

    public $nombre, $tiempoRespuesta;

    protected array $rules = [
        'nombre'          => 'required|string',
        'tiempoRespuesta' => 'required|numeric',
    ];

    protected array $validationAttributes = [
        'tiempoRespuesta' => 'tiempo máximo de respuesta',
    ];

    public function mount(AdCategorias $categoria) {
        $this->categoria = $categoria;
    }

    public function submit() {

        $this->validate($this->rules, [], );

        try {
            
            $data = new AdSubcategorias();
            $data->nombre           = $this->nombre;
            $data->tiempo_respuesta = $this->tiempoRespuesta;
            $data->categoria_id     = $this->categoria->id;
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
