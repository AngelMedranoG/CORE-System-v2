<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CiudadanosController extends Controller {

    public function index() {

        return view('apps.atencion-digital.ciudadanos.index');
    }

}
