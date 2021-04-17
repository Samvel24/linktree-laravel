<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;

class LinkController extends Controller
{
    public function index()
    {
        $links = Auth::user()->links()
            ->get();
        
        return view('links.index', [
            'links' => $links,
        ]);
    }

    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // validamos que los valores de los campos input sean apropiados
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url' // el enlace es requerido y debe estar en un formato url válido
        ]);

        /*
        Se obtiene el usuario autenticado, despues se obtiene la relacion (->links()) y con
        esta relacion se llama al método create() que devuelve un nuevo objeto del modelo Link.
        Al metodo only() se le pasan los atributos 'name' de los input del formulario (create.blade.php)
        Nota 1: Para saber mas sobre create() ver https://laravel.com/api/7.x/Illuminate/Database/Eloquent/Relations/HasMany.html#method_create
        Nota 2: Si se escribiese ->links (sin paréntesis) se obtendrían los links que pertenecen 
        al usuario autenticado, pero eso no es lo que se quiere, por eso se obtiene la relación (con paréntesis)
        */
        $link = Auth::user()->links()->create($request->only(['name', 'link']));

        if($link) // si el link se ha creado correctamente
        {
            return redirect()->to('/dashboard/links'); // volvemos a la página principal de enlaces (links)
        }

        return redirect()->back(); // de lo contrario volvemos a la página anterior
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Link $link)
    {
        if($link->user_id !== Auth::id()) // si el enlace que se intenta editar no pertenece al usuario autenticado
        {
            return abort(404); // se manda mensje de error 404
        }

        return view('links.edit', ['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     */
    public function update(Request $request, Link $link)
    {
        if($link->user_id !== Auth::id()) // si el enlace que se intenta actualizar y guardar no pertenece al usuario autenticado
        { 
            return abort(403); // se manda mensje de error 403 (no autorizado)
        }

        // validamos que los valores de los campos input sean apropiados
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url' // el enlace es requerido y debe estar en un formato url válido
        ]);

        // Al metodo only() se le pasan los atributos 'name' de los input del formulario (edit.blade.php)
        $link->update($request->only(['name', 'link']));

        return redirect()->to('/dashboard/links'); // volvemos a la página principal de enlaces (links)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy(Request $request, Link $link)
    {
        if($link->user_id !== Auth::id()) // si el enlace que se intenta borrar no pertenece al usuario autenticado
        { 
            return abort(403); // se manda mensje de error 403 (no autorizado)
        }

        $link->delete();

        return redirect()->to('/dashboard/links'); // volvemos a la página principal de enlaces (links)
    }
}
