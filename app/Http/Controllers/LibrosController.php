<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros;

class LibrosController extends Controller
{
    public function crear(){
        return view('libros.crear');
    }

    //Funcion guardar
    public function store(Request $request){
        //validacion de datos
        $request->validate([
            'nombre'=>'required|string|max:255',
            'descripcion'=>'required|string',
            'autor'=>'required|string|max:255'
        ]);

        //almacenamiento -> se crea un nuevo libro -> se almacenan los datos desde el request -> y se graban
        $libro = new Libros();
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;

        $libro->save();

        return redirect()->back()->with('success', 'Libro creado con exito');
    }

    public function leer(){
        $libros = Libros::all();
        return view('libros.leer', compact('libros'));
    }

    public function update(Request $request, Libros $libro){
        //Validacion de datos
        $request->validate([
            'nombre'=>'required|string|max:255',
            'descripcion'=>'required|string',
            'autor'=>'required|string|max:255'
        ]);

        //Actualizacion
        $libro->update($request->all());

        return redirect()->back()->with('success', 'Libro actualizado con exito');
    }

    public function eliminar(){
        $libros = Libros::all();
        return view('libros.eliminar', compact('libros'));
    }

    //Funcion Eliminar
    public function destroy(Request $request){
        $Id = $request->input('IdLibro');
        $libro = Libros::find($Id);
        if($libro){
            $libro->delete();
            return redirect()->back()->with('success', 'Libro borrado con exito');
        }else{
            return redirect()->back()->with('error', 'Libro no encontrado');
        }
    }
}