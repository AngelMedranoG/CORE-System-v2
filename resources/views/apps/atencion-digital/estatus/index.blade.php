@extends('layouts.main')
@section('subheader')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Estatus
                </h1>
            </div>
            
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('sistema.atencion-digital.estatus.create') }}" class="btn btn-sm fw-bold btn-primary">
                    <i class="ki-duotone ki-plus fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    Registrar estatus
                </a>
            </div>
        </div>
        
    </div>
@endsection

@section('content')

    @livewire('apps.a-d.estatus.estatus-table')

@endsection