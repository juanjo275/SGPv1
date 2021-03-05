<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoCuentaBancariumRequest;
use App\Http\Requests\UpdateTipoCuentaBancariumRequest;
use App\Http\Resources\Admin\TipoCuentaBancariumResource;
use App\Models\TipoCuentaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoCuentaBancariaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipoCuentaBancariumResource(TipoCuentaBancarium::all());
    }

    public function store(StoreTipoCuentaBancariumRequest $request)
    {
        $tipoCuentaBancarium = TipoCuentaBancarium::create($request->all());

        return (new TipoCuentaBancariumResource($tipoCuentaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TipoCuentaBancarium $tipoCuentaBancarium)
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipoCuentaBancariumResource($tipoCuentaBancarium);
    }

    public function update(UpdateTipoCuentaBancariumRequest $request, TipoCuentaBancarium $tipoCuentaBancarium)
    {
        $tipoCuentaBancarium->update($request->all());

        return (new TipoCuentaBancariumResource($tipoCuentaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TipoCuentaBancarium $tipoCuentaBancarium)
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoCuentaBancarium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
