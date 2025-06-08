<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    // Nombre de la tabla (en singular como definiste)
    protected $table = 'pais';

    // Clave primaria personalizada
    protected $primaryKey = 'codigo_pais';

    // Si usas timestamps en la tabla (created_at, updated_at)
    public $timestamps = true;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre_pais',
        'codigo_continente'
    ];

    // Relación: un país pertenece a un continente
    public function continente()
    {
        return $this->belongsTo(Continente::class, 'codigo_continente', 'codigo_continente');
    }

    // Relación: un país tiene muchos estados
    public function estados()
    {
        return $this->hasMany(Estado::class, 'codigo_pais', 'codigo_pais');
    }
}
    