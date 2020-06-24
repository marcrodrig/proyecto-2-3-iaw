<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Turno;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TurnosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 /*   public function __construct()
    {
        $this->middleware('auth');
    }
*/

    public function index() {
        return view('turnos.index', [
            'turnos' => Turno::all()
        ]);
    }

    public function edit($id) {
        $turno = Turno::find($id);
        return view('turnos.edit', compact('turno'));
    }

    public function create() {
        return view('turnos.create');
    }

    public function store(Request $request) {
       // ver validar uniques
       // ver errores mantener datos válidos
        $validator = Validator::make($request->all(),[
            'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'foto' => ['required', 'mimes:jpeg,bmp,png'],
            'DNI' => ['required', 'numeric'],
            'telefono' => ['required', 'phone:AR'],
            'dia'=> ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s'],
            'tipoTurno'=> ['required', Rule::in(['femenino', 'masculino', 'mixto']),]
        ]);
        //    dd($validator);
        if ($validator->fails()) {
           // dd($validator->messages());
            return redirect(route('turnos.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $file = $request['foto'];
        $filename = $file->getClientOriginalName();
        request('foto')->storeAs('/',$filename);
        //firstOrCreate?
        $cliente = Cliente::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'DNI' => $request->get('DNI'),
            'telefono' => $request->get('telefono'),
            'foto' => $filename
        ]);

        $turno = [
            'dia' => $request->get('dia'),
            'hora' => $request->get('hora'),
            'tipoTurno' => $request->get('tipoTurno')
        ];

        $cliente->turnos()->create($turno);
    //  dd($cliente);
        return redirect('/home')->with('success', 'Turno agregado.');
    }

    public function update($id) {
        $dataTurno = request()->only(['dia', 'hora', 'tipoTurno']);
        $validator = Validator::make($dataTurno,[
            'dia'=> ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s'],
            'tipoTurno'=> ['required', Rule::in(['femenino', 'masculino', 'mixto']),]
        ]);

        if ($validator->fails()) {
            return redirect(route('turnos.edit', $id))
                        ->withErrors($validator)
                        ->withInput();
        }

        $turno = Turno::findOrFail($id);
        $turno->update($dataTurno);

        return redirect('/home')->with('success', 'Turno modificado.');
    }

    public function destroy($id) {
		$turno = Turno::findOrFail($id);
		$turno->delete();
        return redirect('/home')->with('success', 'Turno eliminado.');
    }

}
