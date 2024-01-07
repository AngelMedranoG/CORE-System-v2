<?php

namespace App\Livewire\Apps\AD\Colonias;

use App\Models\AdColonias;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ColoniasTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteColonia')]
    public function deleteColonia($coloniaId) {
        try {
            
            $colonia = AdColonias::findOrFail($coloniaId);
            $colonia->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $colonias = AdColonias::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.colonias.colonias-table', compact('colonias'));
    }

}
