<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        
        return view('apps.atencion-digital.dashboard');
    }
    
}
