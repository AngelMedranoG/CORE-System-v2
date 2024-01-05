<?php

namespace App\Livewire\Apps\AD\Subcategorias;

use App\Models\AdCategorias;
use App\Models\AdSubCategorias;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoriasTable extends Component {

    use WithPagination;

    #[Locked]
    public AdCategorias $categoria;

    public int $perPage = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function mount(AdCategorias $categoria) {
        $this->categoria = $categoria;
    }

    public function updatingPerPage() {
        $this->resetPage();
    }

    #[On('deleteSubcategoria')]
    public function deleteSubcategoria($subcategoriaId) {
        try {
            
            $subcategoria = AdSubCategorias::findOrFail($subcategoriaId);
            $subcategoria->delete();
        }
        catch(Exception $exception) {

            $this->dispatch('showAlertError', $exception->getMessage());
        }
    }

    public function render() {

        $subcategorias = AdSubCategorias::where('nombre', 'like', '%' . $this->search . '%')
        ->where('categoria_id', $this->categoria->id)
        ->paginate($this->perPage);

        return view('livewire.apps.a-d.subcategorias.subcategorias-table', compact('subcategorias'));
    }

}
