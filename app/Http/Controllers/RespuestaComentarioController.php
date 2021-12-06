<?php

namespace App\Http\Controllers;

use App\Models\respuestaComentario;
use Illuminate\Http\Request;

class RespuestaComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Funcion index encargada de mostrar informacion indicada
        return respuestaComentario::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion store encargada de crear nuevos registros
        $respuestaComentario = new respuestaComentario;
        $respuestaComentario->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\respuestaComentario  $respuestaComentario
     * @return \Illuminate\Http\Response
     */
    public function show(respuestaComentario $respuestaComentario)
    {
        //Funcion show encargada de mostrar un registro indicado
        return $respuestaComentario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\respuestaComentario  $respuestaComentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, respuestaComentario $respuestaComentario)
    {
        //Funcion encargada de actualizar registros
        $respuestaComentario->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\respuestaComentario  $respuestaComentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuestaComentario $respuestaComentario)
    {
        //Funcion encargada de eliminar los registros indicados
    }
}
