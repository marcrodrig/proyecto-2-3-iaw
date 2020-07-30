<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $datosValidadosCliente = $request->validate([
             'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
             'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
             'DNI' => ['required', 'numeric'],
             'telefono' => ['required', 'phone:AR'],
             'foto' => ['required', 'mimes:jpeg,bmp,png']
        ]);

        $file = $request['foto'];
       /* $filename = $file->getClientOriginalName();
        $file->storeAs('/',$filename);

        $datosValidadosCliente['foto'] = $filename;*/
        $foto = base64_encode(file_get_contents($file));
        $datosValidadosCliente['foto'] = $foto;

        Cliente::create($datosValidadosCliente);

        return redirect(route('clientes'))->with('success', 'Cliente agregado.');
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

        if($request->has('foto')) {
            /*
            // Elimino foto antigua
            Storage::delete([$cliente->foto]);
            // Almaceno nueva foto
            $file = $request['foto'];
            $fullname = $file->getClientOriginalName();
            $filename = pathinfo($fullname, PATHINFO_FILENAME) . '-cliente' . $cliente->id;
            $extension = pathinfo($fullname, PATHINFO_EXTENSION);
            $filename = $filename.'.'.$extension;
            $file->storeAs('/',$filename);
            $dataCliente['foto'] = $filename;
            */
            $file = $request['foto'];
            $foto = base64_encode(file_get_contents($file));
            $dataCliente['foto'] = $foto;
        }

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

    /** Para API */

    public function list() {
        return Cliente::get();
    }

    public function get($id) {
        return Cliente::findOrFail($id);
    }

    public function crearCliente(Request $request) {
        $datosValidadosCliente = $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
            'DNI' => ['required', 'numeric'],
            'telefono' => ['required', 'phone:AR'],
            'foto' => ['required', 'base64mimes:jpeg,bmp,png']
       ]);
        
       $cliente = Cliente::create($datosValidadosCliente);

       return response()->json(['cliente' =>  $cliente, 'status_code' => 200, 'message' => 'Cliente agregado.']);
   }

   public function editarCliente(Request $request, $id) {
		$datosValidadosCliente = $request->validate([
			'nombre' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
			'apellido' => ['required', 'string', 'min:2', 'max:20', 'alpha'],
			'DNI' => ['required', 'numeric'],
			'telefono' => ['required', 'phone:AR'],
			'foto' => ['required', 'base64mimes:jpeg,bmp,png']
		]);
   		// Si hay un error en la validación, Laravel lanza un error 422

    	$cliente = Cliente::findOrFail($id);

    	$cliente->update($datosValidadosCliente);
   		// dd($cliente);
    	// si no hay cambios, puedo dar un mensaje

    	return response()->json(['cliente' =>  $cliente, 'status_code' => 200, 'message' => 'Cliente modificado.']);
	}

	public function eliminarCliente($id) {
		$cliente = Cliente::findOrFail($id);
		$cliente->delete();
		return response()->json(['status_code' => 200, 'message' => 'Cliente eliminado.']);
	}
   
}