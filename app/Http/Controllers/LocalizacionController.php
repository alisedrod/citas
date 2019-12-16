<?php

namespace App\Http\Controllers;

use App\Localizacion;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\Local;

class LocalizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localizaciones = Localizacion::all();

        return view('localizaciones/index',['localizaciones'=>$localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localizaciones/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255',
        ]);

        $localizacion = new Localizacion($request->all());
        $localizacion->save();

        flash('Localización creada correctamente');

        return redirect()->route('localizaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Localizacion $localizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localizacion = Localizacion::find($id);

        return view('localizaciones/edit',['localizacion'=> $localizacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255',
        ]);

        $localizacion = Localizacion::find($id);
        $localizacion->fill($request->all());
        $localizacion->save();

        flash('Localización modificada correctamente');

        return redirect()->route('localizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localizacion  $localizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localizacion = Localizacion::find($id);
        $localizacion->delete();
        flash('Localización borrada correctamente');

        return redirect()->route('localizaciones.index');
    }
}
