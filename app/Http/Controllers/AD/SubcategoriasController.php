<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdCategorias;
use Exception;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller {

    public function index($categoriaId) {

        try {

            $categoria = AdCategorias::findOrFail($categoriaId);

            return view('apps.atencion-digital.subcategorias.index', compact('categoria'));
        }
        catch(Exception $exception) {

            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.categorias.index'));
        }
    }

    public function create($categoriaId) {

        try {

            $categoria = AdCategorias::findOrFail($categoriaId);

            return view('apps.atencion-digital.subcategorias.create', compact('categoria'));
        }
        catch(Exception $exception) {

            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.categorias.index'));
        }
    }

}
