<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdEstatus;
use Exception;
use Illuminate\Http\Request;

class EstatusController extends Controller {

    public function index() {

        return view('apps.atencion-digital.estatus.index');
    }
    
    public function create() {

        return view('apps.atencion-digital.estatus.create');
    }

    public function edit($estatusId) {

        try {

            $estatus = AdEstatus::findOrFail($estatusId);

            return view('apps.atencion-digital.estatus.edit', compact('estatus'));
        }
        catch(Exception	 $exception) {
            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.estatus.index'));
        }

    }

}
