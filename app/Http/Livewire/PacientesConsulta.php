<?php

namespace App\Http\Livewire;
use App\Models\Paciente;
use Livewire\Component;

class PacientesConsulta extends Component
{
    public function render()
    {
        return view('livewire.pacientes-consulta', [
        'pacientes' => Paciente::with('asignado')


        ]);
    }
}

