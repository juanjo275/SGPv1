<?php

namespace App\Http\Requests;

use App\Models\CuentaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCuentaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cuenta_bancarium_create');
    }

    public function rules()
    {
        return [
            'cbu'        => [
                'string',
                'nullable',
            ],
            'nro_cuenta' => [
                'string',
                'nullable',
            ],
        ];
    }
}
