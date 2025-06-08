<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    // Nombre de la tabla
    protected $table = 'estados';

    // Clave primaria personalizada
    protected $primaryKey = 'codigo_estado';

    // Habilitar timestamps (created_at, updated_at)
    public $timestamps = true;

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'nombre_estado',
        'codigo_continente',
        'codigo_pais'
    ];

    // Relación con Continente (un estado pertenece a un continente)
    public function continente()
    {
        return $this->belongsTo(Continente::class, 'codigo_continente', 'codigo_continente');
    }

    // Relación con Pais (un estado pertenece a un país)
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'codigo_pais', 'codigo_pais');
    }
}
