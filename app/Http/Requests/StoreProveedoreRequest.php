<?php

namespace App\Http\Requests;

use App\Models\Proveedore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProveedoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proveedore_create');
    }

    public function rules()
    {
        return [
            'cuit'         => [
                'string',
                'min:13',
                'max:13',
                'nullable',
            ],
            'razon_social' => [
                'string',
                'nullable',
            ],
            'telefono'     => [
                'string',
                'nullable',
            ],
            'domicilio'    => [
                'string',
                'nullable',
            ],
        ];
    }
}
