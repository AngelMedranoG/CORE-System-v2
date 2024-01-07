<div class="card shadow-sm">

    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    <span class="path1"></span><span class="path2"></span>
                </i> 
                <input type="text" wire:model.live="search" class="form-control form-control-solid w-250px ps-13" placeholder="Buscar categoría">
            </div>
        </div>

        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="mb-5">
                <select wire:model.live="perPage" id="perPage" class="form-select form-select-solid" aria-label="Seleccione una opción">
                    <option value="10">Mostrar 10 registros</option>
                    <option value="50">Mostrar 50 registros</option>
                    <option value="100">Mostrar 100 registros</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card-body py-4">

        <div id="kt_table_routes_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px" tabindex="0" aria-controls="kt_table" aria-label="Nombre de la colonia">
                                Nombre
                            </th>
                            <th class="min-w-125px" tabindex="0" aria-controls="kt_table" aria-label="Código postal">
                                Código postal
                            </th>
                            <th class="min-w-125px" tabindex="0" aria-controls="kt_table" aria-label="Fecha de registro">
                                Fecha de registro
                            </th>
                            <th class="text-end pe-3 min-w-100px" aria-label="Acciones">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">

                        @forelse ($colonias as $colonia)

                            <tr>
                                <td>{{ $colonia->nombre }}</td>
                                <td>{{ $colonia->codigo_postal }}</td>
                                <td>{{ $colonia->getCreatedAtFormatted() }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Acciones
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                    {{-- begin::Menu --}}
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">  
                                        <div class="menu-item px-3">
                                            <a href="{{ route('sistema.atencion-digital.colonias.edit', $colonia->id) }}" class="menu-link px-3">
                                                <i class="ki-duotone ki-pencil fs-5 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                Editar
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" wire:click="$dispatch('dataDelete', {{ $colonia->id }})" class="menu-link px-3">
                                                <i class="ki-duotone ki-trash fs-5 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>
                                    {{-- end::Menu --}}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="4" class="dataTables_empty text-center">No se han encontrado registros</td>
                            </tr>
                        @endforelse
                            
                    </tbody>
                </table>
            </div>

            <div class="pt-4 row justify-content-end">
                <div class="col-sm-12">
                    @if(count($colonias) > 0)
                        {{ $colonias->links() }}
                    @endif
                </div>
            </div>

        </div>
        
    </div>
    
    @push('js')
    
        <script>
            Livewire.on('dataDelete', dataID => {

                Swal.fire({
                    title: "¿Seguro(a) que deseas eliminar el registro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText:"Sí, eliminar",
                    cancelButtonText:"No, cancelar",
                    customClass:{
                        confirmButton:"btn fw-bold btn-danger",
                        cancelButton:"btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {

                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteColonia', {coloniaId: dataID});
                        
                        Swal.fire({
                            title: "Colonia eliminada correctamente",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Continuar",
                            customClass:{
                                confirmButton:"btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        </script>

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