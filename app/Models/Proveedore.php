<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Proveedore extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'proveedores';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cuit',
        'razon_social',
        'telefono',
        'domicilio',
        'email',
        'cuenta_bancaria_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function cuenta_bancaria()
    {
        return $this->belongsTo(CuentaBancarium::class, 'cuenta_bancaria_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
