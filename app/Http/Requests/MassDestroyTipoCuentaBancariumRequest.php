<?php

namespace App\Http\Requests;

use App\Models\TipoCuentaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipoCuentaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipo_cuenta_bancaria,id',
        ];
    }
}
