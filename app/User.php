<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'background_color', 
        'text_color',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function links() 
    {
        return $this->hasMany(Link::class); // un usuario tiene muchos links
    }

    public function visits()
    {
        /* 
        Si quisieramos omitir la tabla dinámica o de enlace y ver cuantos visitas tiene un 
        usuario en particular en su cuenta podemos usar el método hasManyThrough().
        Argumentos hasManyThrough: clase final que desea recopilar y la clase intermedia por la que pasa la relación.
        Lo anterior se basa en: Cada visita pertenece a un link y ese link pertenece a un usuario.
        Esto es, se obtienen todas las visitas de todos los links que tiene un usuario - 6:25
        */
        return $this->hasManyThrough(Visit::class, Link::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
