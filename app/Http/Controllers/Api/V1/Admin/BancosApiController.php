<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Http\Resources\Admin\BancoResource;
use App\Models\Banco;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BancosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('banco_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BancoResource(Banco::all());
    }

    public function store(StoreBancoRequest $request)
    {
        $banco = Banco::create($request->all());

        return (new BancoResource($banco))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Banco $banco)
    {
        abort_if(Gate::denies('banco_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BancoResource($banco);
    }

    public function update(UpdateBancoRequest $request, Banco $banco)
    {
        $banco->update($request->all());

        return (new BancoResource($banco))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Banco $banco)
    {
        abort_if(Gate::denies('banco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banco->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
