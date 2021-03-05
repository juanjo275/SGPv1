<?php

namespace App\Http\Requests;

use App\Models\TipoCuentaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTipoCuentaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipo_cuenta_bancarium_create');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
