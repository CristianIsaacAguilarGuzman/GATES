<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }


    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'evento_user', 'evento_id', 'user_id');
    }    

}