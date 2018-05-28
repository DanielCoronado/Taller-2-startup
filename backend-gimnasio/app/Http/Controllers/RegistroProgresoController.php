<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroProgreso;
use App\Cliente;
use Carbon\Carbon;

class RegistroProgresoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RegistroProgreso::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::find($request->cliente);

        if (!isset($cliente)) {
            $datos = [
                'error' => true,
                'mensaje' => 'No se encontró el cliente de id = ' . $request->cliente,
            ];
            return \Response::json($datos, 404);
        }
        
        $progreso = new RegistroProgreso;
        $progreso->altura = $request->altura;
        $progreso->peso = $request->peso;
        $progreso->imc = round(($request->peso / ($request->altura * $request->altura)), 2, PHP_ROUND_HALF_UP);
        $progreso->id_cliente = $request->cliente;
        $progreso->fecha_registro = Carbon::now()->toDateString();
        $progreso->save();

        $datos = [
            'created' => true,
            'registro' => $progreso,
        ];

        return \Response::json($datos, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progreso = RegistroProgreso::find($id);

        if (!isset($cliente)) {
            $datos = [
                'error' => true,
                'mensaje' => 'No se encontró el cliente de id = ' . $request->cliente,
            ];
            return \Response::json($datos, 404);
        }
        
        return $progreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $progreso = RegistroProgreso::find($id);
        $progreso->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegistroProgreso::destroy($id);
        return ['deleted' => true];
    }
}
