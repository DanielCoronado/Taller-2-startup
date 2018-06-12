<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rutina;
use App\Cliente;
use Carbon\Carbon;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rutina::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AuthController $auth)
    {
        try {
            if ($auth->getAuthenticatedUser()->id_rol != 2) {
                $datos = [
                    'error' => true,
                    'mensaje' => 'El usuario no está autorizado para realizar esta acción',
                ];
                return \Response::json($datos, 401);
            }

            $cliente = Cliente::find($request->cliente);

            if (!isset($cliente)) {
                $datos = [
                    'error' => true,
                    'mensaje' => 'No se encontró el cliente de id = ' . $request->cliente,
                ];
                return \Response::json($datos, 404);
            }
            
            $rutina = new Rutina();
            $rutina->id_tipo_rutina = $request->tipo_rutina;
            $rutina->id_cliente = $cliente->id;
            $rutina->nombre_rutina = $request->nombre;
            $rutina->descripcion = $request->descripcion;
            $rutina->fecha_inicio = Carbon::now()->toDateString();
            $rutina->fecha_termino = $request->termino;
            $rutina->save();

            $datos = [
                'creado' => true,
                'registro' => $rutina,
            ];

            return \Response::json($datos, 200);

        } catch (\Exception $e) {
            return \Response::json('Error: '.$e, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rutina::find($id);
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
        $rutina = Rutina::find($id);
        $rutina->update($request->all());
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
        Rutina::destroy($id);
        return ['deleted' => true];
    }
}
