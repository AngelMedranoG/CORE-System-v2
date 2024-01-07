<?php

namespace App\Livewire\Apps\AD\Departamentos;

use App\Models\AdDepartamentos;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DepartamentosTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteDepartamento')]
    public function deleteDepartamento($departamentoId) {
        try {
            
            $departamento = AdDepartamentos::findOrFail($departamentoId);
            $departamento->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $departamentos = AdDepartamentos::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.departamentos.departamentos-table', compact('departamentos'));
    }

}
