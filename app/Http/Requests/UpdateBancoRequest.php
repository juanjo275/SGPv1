<?php

namespace App\Http\Requests;

use App\Models\Banco;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBancoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banco_edit');
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
