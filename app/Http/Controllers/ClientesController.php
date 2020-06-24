<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.index', [
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $dataCliente = $request->only(['nombre', 'apellido', 'DNI', 'telefono', 'foto']);
        $validator = Validator::make($dataCliente,[
            'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'foto' => ['mimes:jpeg,bmp,png'],
            'DNI' => ['required', 'numeric'],
            'telefono' => ['required', 'phone:AR']
        ]);

        if ($validator->fails()) {
            return redirect(route('clientes.edit', $id))
                        ->withErrors($validator)
                        ->withInput();
        }

        $cliente = Cliente::findOrFail($id);
        $cliente->update($dataCliente);

        return redirect(route('clientes'))->with('success', 'Cliente modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $cliente = Cliente::findOrFail($id);
		$cliente->delete();
        return redirect(route('clientes'))->with('success', 'Cliente eliminado.');
    }
}
