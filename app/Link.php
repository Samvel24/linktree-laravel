<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $guarded = []; // con esto Laravel no protege ninguna columna para que no se asignada en masa

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function visits() 
    {
        return $this->hasMany(Visit::class); // un link tiene muchas visitas
    }
}
