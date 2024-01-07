<div class="card shadow-sm">

    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="fs-6 fw-semibold text-muted">Ingrese la información del canal</div>
        </div>
    </div>

    <div class="card-body">

        <form wire:submit="submit">
            <div class="row">
                <div class="col-12 mb-5">
                    <label class="required fs-5 fw-semibold mb-2">Nombre</label>
                    <input type="text" class="form-control" wire:model="nombre">
                    <div>
                        @error('nombre')
                            <div class="fv-plugins-message-container invalid-feedback">
                                <div>{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end mt-5">
                <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
            </div>

        </form>
        
    </div>
    
    @push('js')

        <script>
            Livewire.on('showAlertError', function(errorMessage) {

                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error',
                    text: errorMessage,
                    confirmButtonText: "Continuar",
                    buttonsStyling: false,
                    customClass:{
                        confirmButton:"btn fw-bold btn-primary",
                    }
                })
            });
        </script>

    @endpush

</div>

