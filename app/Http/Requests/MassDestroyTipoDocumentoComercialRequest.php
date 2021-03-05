<?php

namespace App\Http\Requests;

use App\Models\TipoDocumentoComercial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipoDocumentoComercialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipo_documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipo_documento_comercials,id',
        ];
    }
}
