@extends('layouts.home')



@section('content')
<div class="pt-6"></div>
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Selecciona una aplicación</h3>
        <div class="card-toolbar">
        
        </div>
    </div>
<div class="card-body">
    
    <div class="row">
        <div class="col-6 col-sm-6  col-md-6 col-lg-3">
            <a href="{{ route('sistema.atencion-digital.index') }}">
                <div class="card mb-3 d-flex align-items-center" >
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset('media/menu/atencio-digital.png')}}" class="img-fluid img-thumbnail rounded float-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex align-items-center">
                                <h1 class="card-title pt-4">Sistema de <br> Atención Digital  </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <a href="#">
                <div class="card mb-3 d-flex align-items-center" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('media/menu/atencion-ciudadana.png')}}" class="img-fluid img-thumbnail rounded float-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex align-items-center">
                                <h1 class="card-title pt-4">Gestión y Atención <br> Cidadana </h1>
                                </div>
                            </div>
                        </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-sm-6  col-md-6 col-lg-3">
            <a href="#">
                <div class="card mb-3 d-flex align-items-center" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('media/menu/expediente-digital.png')}}" class="img-fluid img-thumbnail rounded float-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex align-items-center">
                                <h1 class="card-title pt-4">Expediente <br> Digital Único </h1>
                                </div>
                            </div>
                        </div>
                </div>
            </a>
        </div>

        <div class="col-6 col-6 col-sm-6 col-md-6 col-lg-3">
            <a href="#">
                <div class="card mb-3 d-flex align-items-center" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('media/menu/encuestas-ciudadano.png')}}" class="img-fluid img-thumbnail rounded float-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex align-items-center">
                                <h1 class="card-title pt-4">Encuestas al <br> Ciudadano </h1>
                                </div>
                            </div>
                        </div>
                </div>
            </a>
        </div>
    </div>
</div>
   
</div>


@endsection
