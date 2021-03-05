<?php

namespace App\Http\Requests;

use App\Models\CuentaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCuentaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cuenta_bancarium_edit');
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
