<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class CuentaBancarium extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'cuenta_bancaria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cbu',
        'nro_cuenta',
        'banco_id',
        'tipo_cuenta_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function tipo_cuenta()
    {
        return $this->belongsTo(TipoCuentaBancarium::class, 'tipo_cuenta_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
