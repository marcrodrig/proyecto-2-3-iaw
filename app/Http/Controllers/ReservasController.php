<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Turno;

class ReservasController extends Controller
{
    public function list() {
        return Turno::with('Cliente')->get(); 
    }
}
