<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Repositorio\Usuarios\ListarUsuarios::listarTodos();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Repositorio\Usuarios\CrearUsuario::registrarUsuario($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Repositorio\Usuarios\ListarUsuarios::obtenerUsuarioPorId($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
