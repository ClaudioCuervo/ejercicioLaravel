<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['juegos']=Juego::paginate(1);
        return view('juego.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('juego.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'games_name'=>'required|string|max:100',
            'games_price'=>'required|integer',
            'games_des'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=[
            'required'=>':attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);


        //$datosJuego = request()->all();
        $datosJuego = request()->except('_token');

        if($request->hasFile('foto')) {
            $datosJuego['foto']=$request->file('foto')->store('uploads','public');
        }

        Juego::insert($datosJuego);
        //return response()->json($datosJuego);
        return redirect('juego')->with('mensaje','Juego agregado con éxito');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $juego=Juego::findOrFail($id);
        return view('juego.edit', compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'games_name'=>'required|string|max:100',
            'games_price'=>'required|integer',
            'games_des'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>':attribute es requerido'
            ];

        if($request->hasFile('foto')) {
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required'=>'La foto es requerida'];

        }

        $this->validate($request,$campos,$mensaje);

        //
        $datosJuego=request()->except(['_token', '_method']);

        if($request->hasFile('foto')) {
            $juego=Juego::findOrFail($id);
            Storage::delete('public/'.$juego->foto);
            $datosJuego['foto']=$request->file('foto')->store('uploads','public');
        }


        Juego::where('id','=',$id)->update($datosJuego);
        $juego=Juego::findOrFail($id);
        //return view('juego.edit', compact('juego'));
        return redirect('juego')->with('mensaje','Juego modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $juego=Juego::findOrFail($id);

        if(Storage::delete('public/'.$juego->foto)) {
            Juego::destroy($id);
        }

        
        //return redirect('juego');
        return redirect('juego')->with('mensaje','Juego borrado con éxito');
    }
}
