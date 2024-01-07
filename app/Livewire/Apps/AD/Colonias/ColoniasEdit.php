<?php

namespace App\Livewire\Apps\AD\Colonias;

use App\Models\AdColonias;
use Exception;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ColoniasEdit extends Component {

    #[Locked]
    public AdColonias $colonia;

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

    public function mount(AdColonias $colonia) {
        
        $this->colonia = $colonia;

        $this->nombre       = $colonia->nombre;
        $this->codigoPostal = $colonia->codigo_postal;
    }

    public function submit() {

        $this->validate($this->rules());

        try {
            
            $data = $this->colonia;
            $data->nombre        = $this->nombre;
            $data->codigo_postal = $this->codigoPostal;
            $data->save();

            toastr()->success('La colonia ha sido editada correctamente.', 'Colonias', ["positionClass" => "toast-top-right"]);
            return response()->redirectToRoute('sistema.atencion-digital.colonias.index');
        }
        catch(Exception $exception) {
            
            $this->dispatch('showAlertError', $exception->getMessage());
        }

    }

    public function render() {
        return view('livewire.apps.a-d.colonias.colonias-edit');
    }

}
