@extends('layouts.main')
@section('subheader')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Ciudadanos
                </h1>
            </div>
        </div>
        
    </div>
@endsection

@section('content')

    @livewire('apps.a-d.ciudadanos.ciudadanos-table')

@endsection