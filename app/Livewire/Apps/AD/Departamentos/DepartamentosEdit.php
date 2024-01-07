<?php

namespace App\Livewire\Apps\AD\Departamentos;

use App\Models\AdCategorias;
use App\Models\AdDepartamentos;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DepartamentosEdit extends Component {

    #[Locked]
    public AdDepartamentos $departamento;

    #[Locked]
    public $categorias;

    public $nombre, $nombreCorto, $categoriasSeleccionadas = [];

    protected function rules() {
        return [
            'nombre'      => 'required|string',
            'nombreCorto' => 'required|string|max:24',
            'categoriasSeleccionadas' => 'required|array|min:1',
        ];
    }

    protected array $validationAttributes = [
        'categoriasSeleccionadas' => 'categorías',
    ];

    public function mount($departamento) {
        $this->categorias = AdCategorias::all();

        $this->departamento = $departamento;

        $this->nombre      = $departamento->nombre;
        $this->nombreCorto = $departamento->nombre_corto;

        foreach($departamento->categorias as $categoria) {
            $this->categoriasSeleccionadas[] = $categoria->id;
        }
    }

    public function submit() {

        $this->validate($this->rules(), [], $this->validationAttributes);

        try {

            DB::beginTransaction();
            
            $departamento = $this->departamento;
            $departamento->nombre       = $this->nombre;
            $departamento->nombre_corto = $this->nombreCorto;
            $departamento->save();

            $departamento->categorias()->sync($this->categoriasSeleccionadas);

            DB::commit();

            toastr()->success('El departamento ha sido editado correctamente.', 'Departamentos', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.departamentos.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.departamentos.departamentos-edit');
    }

}
