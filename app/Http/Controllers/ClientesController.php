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
        $clientes = clientes::all();

        return view('dashboard.home', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        clientes::destroy($id);

        // TENGO Q RETORNAR ALGO PERO DESPUES LO HAGO JAJA 

    }
}
