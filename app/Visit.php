<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = []; // no se va a proteger ninguna asignación masiva

    public function link()
    {
        return $this->belongsTo(Link::class); // cada visita pertenece a un link
    }
}
