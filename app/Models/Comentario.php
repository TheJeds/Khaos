<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;    
    
    protected $fillable = [
        'user_id',
        'producto_id',
        'titulo', 
        'comentario'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function setTituloAttribute($titulo)
    {
        return $this->attributes['titulo'] = strtoupper($titulo);
    }
}
