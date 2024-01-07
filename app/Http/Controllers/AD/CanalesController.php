<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use App\Models\AdCanales;
use Exception;
use Illuminate\Http\Request;

class CanalesController extends Controller {

    public function index() {

        return view('apps.atencion-digital.canales.index');
    }
    
    public function create() {

        return view('apps.atencion-digital.canales.create');
    }

    public function edit($canalId) {

        try {

            $canal = AdCanales::findOrFail($canalId);

            return view('apps.atencion-digital.canales.edit', compact('canal'));
        }
        catch(Exception	 $exception) {
            
            toastr()->error($exception->getMessage(), 'Ha ocurrido un error', ["positionClass" => "toast-top-right"]);
            return redirect(route('sistema.atencion-digital.canales.index'));
        }

    }

}
