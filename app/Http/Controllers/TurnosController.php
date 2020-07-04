<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Turno;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TurnosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('turnos.index', [
            'turnos' => Turno::all()
        ]);
    }

    public function edit($id) {
        $turno = Turno::find($id);
        return view('turnos.edit', compact('turno'));
    }

    public function createStep1(Request $request) {
        $clientes = Cliente::all();
        return view('turnos.create.step1')->with('clientes', $clientes);
    }

    public function postCreateStep1(Request $request) {
        $idCliente = $request->validate(['id' => ['required']]);
        return redirect()->route('turnos.create.step2', $idCliente['id']);
    }

   public function createStep2($idCliente) {
        $cliente = Cliente::findOrFail($idCliente);
        return view('turnos.create.step2', compact('cliente'));
    }

    public function postCreateStep2($idCliente) {
        $cliente = Cliente::findOrFail($idCliente);
        return redirect()->route('turnos.create.step3',$cliente);
    }

    public function createStep3($idCliente) {
        $cliente = Cliente::findOrFail($idCliente);
        return view('turnos.create.step3', compact('cliente'));
    }

    public function store(Request $request) {
        $datosValidadosTurno = $request->validate([
            'dia'=> ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s',
                    Rule::unique('turnos')->where(function ($query) use ($request) {
                        return $query->where('dia', $request->dia);})
                    ],
            'tipoTurno'=> ['required', Rule::in(['femenino', 'masculino', 'mixto']),]
        ]);
        
        $cliente = Cliente::findOrFail($request->get('idCliente'));
        $cliente->turnos()->create($datosValidadosTurno);

        return redirect('/home')->with('success', 'Turno agregado.');
    }

    public function update(Request $request, $id) {
        $datosTurno = $request->only(['dia', 'hora', 'tipoTurno']);
        $validadorCreate = Validator::make($datosTurno, [
            'dia'=> ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s',
                    Rule::unique('turnos')->where(function ($query) use ($request) {
                        return $query->where('dia', $request->dia);})
                    ],
            'tipoTurno'=> ['required', Rule::in(['femenino', 'masculino', 'mixto']),]
        ]);

        $turno = Turno::findOrFail($id);
    //    dd($validadorCreate);
        if ($validadorCreate->fails() &&
            $validadorCreate->getData()['dia'] == $turno->dia &&
            $validadorCreate->getData()['hora'] == $turno->hora || $validadorCreate->passes()) {
                $turno->update($datosTurno);        
                return redirect('/home')->with('success', 'Turno modificado.');
            }
        else
            return redirect(route('turnos.edit', $id))
                        ->withErrors($validadorCreate)
                        ->withInput();
    }

    public function destroy($id) {
		$turno = Turno::findOrFail($id);
		$turno->delete();
        return redirect('/home')->with('success', 'Turno eliminado.');
    }

    public function list() {
        return Turno::get();
    }

    public function get($id) {
        return Turno::findOrFail($id);
    }

}
