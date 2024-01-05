<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdCategorias;
use Exception;
use Illuminate\Http\Request;

class CategoriasController extends Controller {

    public function index() {

        return view('apps.atencion-digital.categorias.index');
    }
    
    public function create() {

        return view('apps.atencion-digital.categorias.create');
    }

    public function edit($categoriaId) {

        try {

            $categoria = AdCategorias::findOrFail($categoriaId);

            return view('apps.atencion-digital.categorias.edit', compact('categoria'));
        }
        catch(Exception $exception) {
            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.categorias.index'));
        }

    }
}
