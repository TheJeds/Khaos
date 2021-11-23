<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuidado extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function getCuidadoDescripcionAttribute()
    {
        return $this->cuidado . ' (' . $this->descripcion . ')';
    }
}
