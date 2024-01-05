<?php

namespace App\Livewire\Apps\AD\Categorias;

use App\Models\AdCategorias;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriasTable extends Component {

    use WithPagination;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteCategoria')]
    public function deleteCategoria($categoriaId) {
        try {
            
            $categoria = AdCategorias::findOrFail($categoriaId);
            $categoria->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $categorias = AdCategorias::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->perPage);

        return view('livewire.apps.a-d.categorias.categorias-table', compact('categorias'));
    }

}
