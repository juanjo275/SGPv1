<?php

namespace App\Http\Requests;

use App\Models\EstadoDocumentoComercial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEstadoDocumentoComercialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estado_documento_comercial_create');
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
