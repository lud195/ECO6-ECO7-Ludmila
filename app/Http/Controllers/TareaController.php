<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all(); // Obtiene todas las tareas
        return view('tareas.index', compact('tareas')); // Retorna la vista con las tareas
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create'); // Muestra el formulario para crear una nueva tarea
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255', // Valida que el título sea requerido y no tenga más de 255 caracteres
        ]);

        Tarea::create($request->only('titulo')); // Crea la nueva tarea con los datos del request
        return redirect()->route('tareas.index'); // Redirige al listado de tareas
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea')); // Muestra la tarea específica
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea')); // Muestra el formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'completada' => 'boolean',
        ]);

        $tarea->update($request->only('titulo', 'completada')); // Actualiza la tarea con los nuevos datos
        return redirect()->route('tareas.index'); // Redirige al listado de tareas
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete(); // Elimina la tarea
        return redirect()->route('tareas.index'); // Redirige al listado de tareas
    }
}

