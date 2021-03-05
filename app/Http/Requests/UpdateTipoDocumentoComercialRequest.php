<?php

namespace App\Http\Requests;

use App\Models\TipoDocumentoComercial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTipoDocumentoComercialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipo_documento_comercial_edit');
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
