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

    public function index()
    {
        return view('turnos.index', [
            'turnos' => Turno::all()
        ]);
    }

    public function getEvents()
{
    $getEvents = Turno::select('cliente_id', 'dia', 'hora', 'tipoTurno')->get();
    $events = [];

    foreach ($getEvents as $values) {
        $cliente = Cliente::find($values->cliente_id);
        $datetime = $values->dia . ' ' . $values->hora;
        $event = [];
        $event['title'] = $cliente->nombre . ' ' . $cliente->apellido;
        $event['start'] = $datetime;
        $event['tipoTurno'] = "Turno masculino";
        $events[] = $event;
    }

    return $events;
}
    public function store(Request $request)
    {
       // ver validar uniques
       // ver errores mantener datos válidos
        $validator = Validator::make($request->all(),[
            'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'foto' => ['required', 'mimes:jpeg,bmp,png'],
            'DNI' => ['required', 'numeric'],
            'dateRange'=> ['required', 'date'],
            'hora' => ['required', 'date_format:H:i:s'],
            'tipoTurno'=> ['required', Rule::in(['femenino', 'masculino', 'mixto']),]
        ]);
        //    dd($validator);
        if ($validator->fails()) {
           // dd($validator->messages());
            return redirect('/home')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $file = $request['foto'];
        $filename = $file->getClientOriginalName();
        request('foto')->storeAs('/',$filename);
        //firstOrCreate?
        $cliente = Cliente::create([
            //SEGUIR DE ACA
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'DNI' => $request->get('DNI'),
            'telefono' => 435876,
            'foto' => $filename
        ]);

        $turno = [
            'dia' => $request->get('dateRange'),
            'hora' => $request->get('hora'),
            'tipoTurno' => $request->get('tipoTurno')
        ];

        $cliente->turnos()->create($turno);
    //  dd($cliente);
        return redirect('/home')->with('success', 'Contact saved!');
    }

}
