<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\User;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Cliente::all();

        return Cliente::join('users', 'users.id', '=', 'clientes.id_usuario')
            ->join('rol', 'rol.id', '=', 'users.id_rol')
            ->select(
                DB::raw(
                    'clientes.id,
                    clientes.id_usuario,
                    clientes.nombre, 
                    clientes.apellidos,
                    users.email,
                    clientes.rut,
                    clientes.edad,
                    users.id_rol,
                    rol.descripcion as rol'
                ))
            ->orderBy('clientes.id')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->id_rol = $request->id_rol;
        //$usuario->id_rol = 3;
        $usuario->save();

        $cliente = new Cliente();
        $cliente->id_usuario = $usuario->id;
        $cliente->rut = $request->rut;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->edad = $request->edad;
        $cliente->save();

        return ['created' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Cliente::find($id);

        return Cliente::join('users', 'users.id', '=', 'clientes.id_usuario')
            ->join('rol', 'rol.id', '=', 'users.id_rol')
            ->select(
                DB::raw(
                    'clientes.id,
                    clientes.id_usuario,
                    clientes.nombre, 
                    clientes.apellidos,
                    users.email,
                    clientes.rut,
                    clientes.edad,
                    users.id_rol,
                    rol.descripcion as rol'
                ))
            ->where('clientes.id', $id)
            ->orderBy('clientes.id')
            ->first();
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
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
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
        Cliente::destroy($id);
        return ['deleted' => true];
    }

    public function entrenadores() {
        return Cliente::join('users', 'users.id', '=', 'clientes.id_usuario')
            ->join('rol', 'rol.id', '=', 'users.id_rol')
            ->select(
                DB::raw(
                    'clientes.id,
                    clientes.id_usuario,
                    clientes.nombre, 
                    clientes.apellidos,
                    users.email,
                    clientes.rut,
                    clientes.edad,
                    users.id_rol,
                    rol.descripcion as rol'
                ))
            ->where('users.id_rol', 2)
            ->get();
    }
}
