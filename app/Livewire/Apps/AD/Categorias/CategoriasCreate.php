<?php

namespace App\Livewire\Apps\AD\Categorias;

use App\Models\AdCategorias;
use Exception;
use Livewire\Component;

class CategoriasCreate extends Component {

    public $nombre, $nombreCorto, $mostrarEnBot;

    public function rules() {
        return [
            'nombre'       => 'required|string',
            'nombreCorto'  => 'required|string|max:24',
            'mostrarEnBot' => 'required|boolean',
        ];
    }

    public array $validationAttributes = [
        'mostrarEnBot' => '¿mostrar en bot?',
    ];

    public function submit() {

        $this->validate($this->rules(), [], $this->validationAttributes);

        try {
            
            $data = new AdCategorias();
            $data->nombre       = $this->nombre;
            $data->nombre_corto = $this->nombreCorto;
            $data->mostrar_bot  = $this->mostrarEnBot;
            $data->save();

            toastr()->success('La categoría ha sido registrada correctamente.', 'Categorías', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.categorias.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.categorias.categorias-create');
    }

}
