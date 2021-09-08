<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteRequestActualizar;
use App\Http\Requests\EstudianteRequestGuardar;
use App\Http\Resources\EstudianteResource;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EstudianteResource::collection(Estudiante::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequestGuardar $request)
    {
        return (new EstudianteResource(Estudiante::create($request->all())))
            ->additional(['mensaje' => 'Estudiante guardado'])
            ->response()
            ->setStatusCode(200);
        // return response()->json([
        //     'respuesta' => true,
        //     'mensaje' => 'Estudiante guardado'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        // return response()->json([
        //     'respuesta' => true,
        //     'mensaje' => $estudiante
        // ]);
        return new EstudianteResource($estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteRequestActualizar $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
        // return response()->json([
        //     'respuesta' => true,
        //     'mensaje' => 'Estudiante actualizado'
        // ]);
        return (new EstudianteResource($estudiante))
            ->additional(['mensaje' => 'Estudiante actualizado'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        // return response()->json([
        //     'respuesta' => true,
        //     'mensaje' => 'Estudiante eliminado'
        // ]);
        return (new EstudianteResource($estudiante))
            ->additional(['mensaje' => 'Estudiante eliminado'])
            ->response()
            ->setStatusCode(200);
    }
}
