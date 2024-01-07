<?php

namespace App\Livewire\Apps\AD\Estatus;

use App\Models\AdEstatus;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EstatusTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteEstatus')]
    public function deleteEstatus($estatusId) {
        try {
            
            $estatus = AdEstatus::findOrFail($estatusId);
            $estatus->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $estatusList = AdEstatus::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.estatus.estatus-table', compact('estatusList'));
    }

}
