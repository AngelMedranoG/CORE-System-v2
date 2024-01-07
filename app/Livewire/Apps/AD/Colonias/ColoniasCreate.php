<?php

namespace App\Livewire\Apps\AD\Colonias;

use App\Models\AdColonias;
use Exception;
use Livewire\Component;

class ColoniasCreate extends Component {

    public $nombre, $codigoPostal;

    protected function rules() {
        return [
            'nombre'       => ['required', 'string'],
            'codigoPostal' => ['required', 'numeric', 'digits:5'],
        ];
    }

    protected array $validationAttributes = [
        'codigoPostal' => 'código postal',
    ];

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = new AdColonias();
            $data->nombre        = $this->nombre;
            $data->codigo_postal = $this->codigoPostal;
            $data->save();

            toastr()->success('La colonia ha sido registrada correctamente.', 'Colonias', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.colonias.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.colonias.colonias-create');
    }

}
