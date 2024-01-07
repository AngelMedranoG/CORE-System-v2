<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdDepartamentos;
use Exception;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

    public function index() {

        return view('apps.atencion-digital.departamentos.index');
    }
    
    public function create() {

        return view('apps.atencion-digital.departamentos.create');
    }

    public function edit($departamentoId) {

        try {

            $departamento = AdDepartamentos::findOrFail($departamentoId);

            return view('apps.atencion-digital.departamentos.edit', compact('departamento'));
        }
        catch(Exception $exception) {
            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.departamentos.index'));
        }
    }

}
