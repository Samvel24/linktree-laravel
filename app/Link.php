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

    public function latest_visit()
    {
        // Lo siguiente permite obtener la relación asociada mas nueva para la fecha del campo created_at
        return $this->hasOne(Visit::class)->latest();
    }
}
