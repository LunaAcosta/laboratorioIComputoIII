<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['datosTareas'] = Tarea::paginate(5);
        return view('tarea.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'NombreTarea' => 'required|string|max:50',
            'TituloTarea' => 'required|string|max:80',
            'Descripcion' => 'required|string|max:80',
            'Asignatura' => 'required|string|max:80',
            'NombreDocente' => 'required|string|max:80',

        ];
        $mensaje = [
            'required' => 'El Campo :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);



        $datosTarea = request()->except('_token');
        Tarea::insert($datosTarea);
        //return response()->json($datosTarea);
        return redirect('tarea')->with('mensaje', 'Se ha registrado una nueva tarea');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tarea = Tarea::findOrFail($id);

        return view('tarea.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'NombreTarea' => 'required|string|max:50',
            'TituloTarea' => 'required|string|max:80',
            'Descripcion' => 'required|string|max:80',
            'Asignatura' => 'required|string|max:80',
            'NombreDocente' => 'required|string|max:80',

        ];
        $mensaje = [
            'required' => 'El Campo :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //
        $datosTarea = request()->except('_token', '_method');
        Tarea::where('id', '=', $id)->update($datosTarea);

        $tarea = Tarea::findOrFail($id);
        //return view('tarea.edit', compact('tarea'));
        return redirect('tarea')->with('mensaje', 'Se ha modificado el registro');





    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Tarea::destroy($id);
        return redirect('tarea')->with('mensaje', 'Has Eliminado el registro');

    }
}