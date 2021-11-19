<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'precio',
        'cantidad',
        'tipo',
        'imagen',
        'marca_id',
    ];

    public function marca(){

        return $this->belongsTo(Marca::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function cuidados()
    {
        return $this->belongsToMany(Cuidado::class);
    }
}