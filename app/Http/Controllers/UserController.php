<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  App\User $user
     */
    public function show(User $user)
    {
        /* Con load() se cargaran los enlaces (links) de forma diferida y de manera automática en el objeto usuario ($user) antes de pasarlo a la vista.
           Esto ayuda a evitar que se realice una consulta SQL secundaria en el ciclo forach de la vista users.show ($user->links)
           Ver: https://laravel.com/api/7.x/Illuminate/Database/Eloquent/Model.html#method_load
        */
        $user->load('links');

        return view('users.show', ['user' => $user]);
    }

    public function edit()
    {
        return view('users.edit', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only(['background_color', 'text_color']));

        return redirect()->back()
            ->with(['success' => '¡Cambios guardados exitosamente!']); // with() toma una matriz de valores y la coloca en la sesión
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
