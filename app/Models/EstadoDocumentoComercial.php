<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class EstadoDocumentoComercial extends Model
{
    use SoftDeletes;

    public $table = 'estado_documento_comercials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'descripcion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function estadoDocumentoComercialDocumentoComercials()
    {
        return $this->belongsToMany(DocumentoComercial::class);
    }
}
