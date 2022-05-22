<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //modelo, dos puntos y  el metodo
        //Paciente::find(user_id);
        $pacientes = Paciente::all();
        //ahora le pasamos la variable registros a la vista
        return view('pacientes.index')->with('pacientes', $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacientes = new Paciente();

        $pacientes->names = $request->get('names');
        $pacientes->lastnames = $request->get('lastnames');
        $pacientes->rut = $request->get('rut');
        $pacientes->telephone = $request->get('telephone');
        $pacientes->email = $request->get('email');
        $pacientes->birthday = $request->get('birthday');
        $pacientes->anamnesis = $request->get('anamnesis');
        $pacientes->observacion = $request->get('observacion');


        //$pacientes->foto = $request->hasFile('foto');

        if($foto = $request->file('foto')) {
            $rutaGuardarImg = 'FotosPerfil/';
            $imagenPaciente = 'FotoPerfil.'. $pacientes->rut. "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $imagenPaciente);
            $pacientes->foto = "$imagenPaciente";             
        }

        if($anamnesis = $request->file('anamnesis')) {
            $rutaGuardarImg = 'anamnesis/';
            $anamnesisPaciente = 'anamnesis.'. $pacientes->rut. "." . $anamnesis->getClientOriginalExtension();
            $anamnesis->move($rutaGuardarImg, $anamnesisPaciente);
            $pacientes->anamnesis = "$anamnesisPaciente";             
        }

        $pacientes->save();

        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('pacientes.edit')->with('paciente', $paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $paciente->names = $request->get('names');
        $paciente->lastnames = $request->get('lastnames');
        $paciente->rut = $request->get('rut');
        $paciente->telephone = $request->get('telephone');
        $paciente->email = $request->get('email');
        $paciente->birthday = $request->get('birthday');
        $paciente->anamnesis = $request->get('anamnesis');
        $paciente->observacion = $request->get('observacion');

        $paciente->save();

        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect('/pacientes');
    }
}
