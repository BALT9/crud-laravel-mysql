<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = 'continentes';

    protected $primaryKey = 'codigo_continente';

    public $timestamps = true;

    protected $fillable = [
        'nombre_continente'
    ];

    // Relación con países (un continente tiene muchos países)
    public function paises()
    {
        return $this->hasMany(Pais::class, 'codigo_continente', 'codigo_continente');
    }

}
