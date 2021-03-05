<?php

namespace App\Http\Requests;

use App\Models\DocumentoComercial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocumentoComercialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('documento_comercial_edit');
    }

    public function rules()
    {
        return [
            'fecha'                         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'estado_documento_comercials.*' => [
                'integer',
            ],
            'estado_documento_comercials'   => [
                'array',
            ],
        ];
    }
}
