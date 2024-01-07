<?php

namespace App\Livewire\Apps\AD\Departamentos;

use App\Models\AdCategorias;
use App\Models\AdDepartamentoCategoria;
use App\Models\AdDepartamentos;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DepartamentosCreate extends Component {

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

    public function mount() {
        $this->categorias = AdCategorias::all();
    }

    public function submit() {

        $this->validate($this->rules(), [], $this->validationAttributes);

        try {

            DB::beginTransaction();
            
            $departamento = new AdDepartamentos();
            $departamento->nombre       = $this->nombre;
            $departamento->nombre_corto = $this->nombreCorto;
            $departamento->save();

            $departamento->categorias()->attach($this->categoriasSeleccionadas);

            DB::commit();

            toastr()->success('El departamento ha sido registrado correctamente.', 'Departamentos', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.departamentos.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.departamentos.departamentos-create');
    }

}
