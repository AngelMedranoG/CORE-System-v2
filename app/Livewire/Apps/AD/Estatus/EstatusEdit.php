<?php

namespace App\Livewire\Apps\AD\Estatus;

use App\Models\AdEstatus;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EstatusEdit extends Component {

    #[Locked]
    public AdEstatus $estatus;

    public $nombre;

    public function rules() {
        return [
            'nombre' => ['required', 'string', Rule::unique('ad_estatuses', 'nombre')->ignore($this->estatus->id)->whereNull('deleted_at')],
        ];
    }

    public function mount(AdEstatus $estatus) {
        
        $this->estatus = $estatus;

        $this->nombre = $estatus->nombre;
    }

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = $this->estatus;
            $data->nombre       = $this->nombre;
            $data->save();

            toastr()->success('El estatus ha sido editado correctamente.', 'Estatus', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.estatus.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.estatus.estatus-edit');
    }

}
