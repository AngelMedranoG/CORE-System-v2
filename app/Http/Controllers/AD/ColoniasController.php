<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdColonias;
use Exception;
use Illuminate\Http\Request;

class ColoniasController extends Controller {

    public function index() {

        return view('apps.atencion-digital.colonias.index');
    }
    
    public function create() {

        return view('apps.atencion-digital.colonias.create');
    }

    public function edit($coloniaId) {

        try {

            $colonia = AdColonias::findOrFail($coloniaId);

            return view('apps.atencion-digital.colonias.edit', compact('colonia'));
        }
        catch(Exception $exception) {
            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.colonias.index'));
        }
    }

}
