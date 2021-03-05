<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCuentaBancariumRequest;
use App\Http\Requests\UpdateCuentaBancariumRequest;
use App\Http\Resources\Admin\CuentaBancariumResource;
use App\Models\CuentaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CuentaBancariaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cuenta_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CuentaBancariumResource(CuentaBancarium::with(['banco', 'tipo_cuenta', 'created_by'])->get());
    }

    public function store(StoreCuentaBancariumRequest $request)
    {
        $cuentaBancarium = CuentaBancarium::create($request->all());

        return (new CuentaBancariumResource($cuentaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CuentaBancarium $cuentaBancarium)
    {
        abort_if(Gate::denies('cuenta_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CuentaBancariumResource($cuentaBancarium->load(['banco', 'tipo_cuenta', 'created_by']));
    }

    public function update(UpdateCuentaBancariumRequest $request, CuentaBancarium $cuentaBancarium)
    {
        $cuentaBancarium->update($request->all());

        return (new CuentaBancariumResource($cuentaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CuentaBancarium $cuentaBancarium)
    {
        abort_if(Gate::denies('cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuentaBancarium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
