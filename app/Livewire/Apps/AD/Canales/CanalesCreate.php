<?php

namespace App\Livewire\Apps\AD\Canales;

use App\Models\AdCanales;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CanalesCreate extends Component {

    public $nombre;

    public function rules() {
        return [
            'nombre' => ['required', 'string', Rule::unique('ad_canales', 'nombre')->whereNull('deleted_at')],
        ];
    }

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = new AdCanales();
            $data->nombre = $this->nombre;
            $data->save();

            toastr()->success('El canal ha sido registrado correctamente.', 'Canales', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.canales.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.canales.canales-create');
    }

}
