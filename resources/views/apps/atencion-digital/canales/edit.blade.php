@extends('layouts.main')
@section('subheader')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Editar canal
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('sistema.atencion-digital.canales.index') }}" class="text-muted text-hover-primary">
                            Canales 
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Editar canal 
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('sistema.atencion-digital.canales.index') }}" class="btn btn-sm fw-bold btn-primary">
                    <i class="ki-duotone ki-black-left fs-2">
                    </i>
                    Ver registros
                </a>
            </div>
        </div>
        
    </div>
@endsection

@section('content')

    @livewire('apps.a-d.canales.canales-edit', ['canal' => $canal])

@endsection