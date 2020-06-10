<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;
use Carbon\Carbon;
use Response;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('turnos.index', [
            'turnos' => Turno::all()
        ]);
    }

    public function getEvents()
{
    $getEvents = Turno::select('descripcion', 'dia', 'horario')->get();
    $events = [];

    foreach ($getEvents as $values) {
        $date = Carbon::parse($values->dia)->format('Y-m-d');
        $event = [];
        $event['title'] = $values->descripcion;
        $event['start'] = $date . "T" . $values->horario;
        $event['description'] = "Turno masculino";
        $events[] = $event;
    }

    return $events;
}
}
