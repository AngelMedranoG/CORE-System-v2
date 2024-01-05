<div class="card shadow-sm">

    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="fs-6 fw-semibold text-muted">Ingrese la información de la categoría que requiere modificar</div>
        </div>
    </div>

    <div class="card-body">

        <form wire:submit="submit">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-5">
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

                <div class="col-sm-12 col-md-6 mb-5">
                    <label class="required fs-5 fw-semibold mb-2">Nombre corto</label>
                    <input type="text" class="form-control" wire:model="nombreCorto">
                    <div>
                        @error('nombreCorto')
                            <div class="fv-plugins-message-container invalid-feedback">
                                <div>{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 mb-5">
                    <label class="required fs-5 fw-semibold mb-4">¿Mostrar la categoría en el bot?</label>
                    <div class="form-check form-check-custom form-check-solid mb-5">
                        <input class="form-check-input" type="radio" value="1" wire:model="mostrarEnBot" id="mostrar-en-bot"/>
                        <label class="form-check-label" for="mostrar-en-bot">
                            Sí mostrar en bot
                        </label>
                    </div>
                    <div class="form-check form-check-custom form-check-solid mb-5">
                        <input class="form-check-input" type="radio" value="0" wire:model="mostrarEnBot" id="no-mostrar-en-bot"/>
                        <label class="form-check-label" for="no-mostrar-en-bot">
                            No mostrar en bot
                        </label>
                    </div>
                    <div>
                        @error('mostrarEnBot')
                            <div class="fv-plugins-message-container invalid-feedback">
                                <div>{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end mt-5">
                <button type="submit" class="btn btn-lg btn-primary">Editar</button>
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

