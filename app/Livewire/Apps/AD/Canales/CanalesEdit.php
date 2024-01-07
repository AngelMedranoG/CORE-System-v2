<?php

namespace App\Livewire\Apps\AD\Canales;

use App\Models\AdCanales;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;

class CanalesEdit extends Component {

    #[Locked]
    public AdCanales $canal;

    public $nombre;

    protected function rules() {
        return [
            'nombre' => ['required', 'string', Rule::unique('ad_canales', 'nombre')->ignore($this->canal->id)->whereNull('deleted_at')],
        ];
    }

    public function mount(AdCanales $canal) {
        
        $this->canal = $canal;

        $this->nombre = $canal->nombre;
    }

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = $this->canal;
            $data->nombre = $this->nombre;
            $data->save();

            toastr()->success('El canal ha sido editado correctamente.', 'Canales', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.canales.index');
        }
        catch(Exception	 $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.canales.canales-edit');
    }

}
