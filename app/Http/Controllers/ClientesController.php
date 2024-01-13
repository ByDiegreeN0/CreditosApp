<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = clientes::all()
        ->where('cliente_estado', 'activo');

        return view('dashboard.home', compact('clientes'));
    }

  
    public function store(Request $request)
    {
       $cliente = $request->except('_token');

       Clientes::create($cliente);

       return redirect()->route('dashboard')->with('success', 'Cliente Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($cliente_id)
    {
        
        $cliente = clientes::find($cliente_id);

        if(!$cliente){
            abort(404);
        }

        $pagos = $cliente->pagos;
        
        return view('dashboard.card', compact('cliente', 'pagos'));
    }

    public function showClienteView($cliente_id){
        $cliente = clientes::find($cliente_id);

        if(!$cliente){
            abort(404);
        }

        $pagos = $cliente->pagos;
        
        return view('dashboard.cliente_view', compact('cliente', 'pagos'));
    }

    public function showInactiveClients(){
        $cancelados = clientes::all()
        ->where('cliente_estado', 'cancelado');

        return view('dashboard.cancelados', compact('cancelados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
    }

    public function update(Request $request, $cliente_id)
    {

        $request->validate([
            'cancelado' => 'required|string',
        ]);

        $cliente = clientes::findOrFail($cliente_id);

        $cliente->cliente_estado = $request->input('cancelado');

        $cliente->save();

        return redirect()->route('dashboard')->with('success', 'tarjeta del cliente cancelada correctamente');
    }

  
    public function cancelClient($cliente_id){

    }
    public function destroy($id)
    {
      
    }
}
