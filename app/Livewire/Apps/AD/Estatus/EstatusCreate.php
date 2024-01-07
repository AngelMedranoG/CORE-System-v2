<?php

namespace App\Livewire\Apps\AD\Estatus;

use App\Models\AdEstatus;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EstatusCreate extends Component {

    public $nombre;

    public function rules() {
        return [
            'nombre' => ['required', 'string', Rule::unique('ad_estatuses', 'nombre')->whereNull('deleted_at')],
        ];
    }

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = new AdEstatus();
            $data->nombre       = $this->nombre;
            $data->save();

            toastr()->success('El estatus ha sido registrado correctamente.', 'Estatus', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.estatus.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.estatus.estatus-create');
    }

}
