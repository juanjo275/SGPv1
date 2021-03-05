<?php

namespace App\Http\Requests;

use App\Models\CuentaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCuentaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cuenta_bancaria,id',
        ];
    }
}
