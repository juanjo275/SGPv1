<?php

namespace App\Http\Requests;

use App\Models\Proveedore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProveedoreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('proveedore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:proveedores,id',
        ];
    }
}
