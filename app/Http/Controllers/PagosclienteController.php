<?php

namespace App\Http\Controllers;

use App\Models\pagoscliente;
use Illuminate\Http\Request;
use App\Models\clientes;


class PagosclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request, $cliente_id)
    {

        $request->validate([
            'pago_fecha' => 'required|date',
        ]);

        $pago = new pagoscliente;
        $pago->pago_fecha = $request->input('pago_fecha');
        $pago->pago_abono = $request->input('pago_cantidad');
        $pago->cliente_id = $cliente_id;
        $pago->save();

        return redirect()->route('cliente', ['cliente_id' => $cliente_id])->with('success', 'pago agregado correctamente');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(pagoscliente $pagoscliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pagoscliente $pagoscliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pagoscliente $pagoscliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pagoscliente $pagoscliente)
    {
        //
    }
}
