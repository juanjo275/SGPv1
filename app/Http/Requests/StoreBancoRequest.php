<?php

namespace App\Http\Requests;

use App\Models\Banco;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBancoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banco_create');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'string',
                'nullable',
            ],
            'sucursal'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
