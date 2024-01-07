<?php

namespace App\Livewire\Apps\AD\Canales;

use App\Models\AdCanales;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CanalesTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteCanal')]
    public function deleteCanal($canalId) {
        try {
            
            $canal = AdCanales::findOrFail($canalId);
            $canal->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $canales = AdCanales::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.canales.canales-table', compact('canales'));
    }

}
