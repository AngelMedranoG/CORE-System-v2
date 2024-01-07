<?php

namespace App\Livewire\Apps\AD\Ciudadanos;

use App\Models\Edu;
use Livewire\Component;
use Livewire\WithPagination;

class CiudadanosTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    public function render() {

        $ciudadanos = Edu::where('curp', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.ciudadanos.ciudadanos-table', compact('ciudadanos'));
    }

}
