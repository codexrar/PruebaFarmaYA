<?php

namespace App\Http\Controllers;

use App\Calificacion;
use Illuminate\Http\Request;

/**
 * Class CalificacionController
 * @package App\Http\Controllers
 */
class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificacions = Calificacion::paginate();

        return view('calificacion.index', compact('calificacions'))
            ->with('i', (request()->input('page', 1) - 1) * $calificacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calificacion = new Calificacion();
        return view('calificacion.create', compact('calificacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Calificacion::$rules);

        $calificacion = Calificacion::create($request->all());

        return redirect()->route('calificacions.index')
            ->with('success', 'Calificacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificacion = Calificacion::find($id);

        return view('calificacion.show', compact('calificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calificacion = Calificacion::find($id);

        return view('calificacion.edit', compact('calificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Calificacion $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        request()->validate(Calificacion::$rules);

        $calificacion->update($request->all());

        return redirect()->route('calificacions.index')
            ->with('success', 'Calificacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calificacion = Calificacion::find($id)->delete();

        return redirect()->route('calificacions.index')
            ->with('success', 'Calificacion deleted successfully');
    }
}
