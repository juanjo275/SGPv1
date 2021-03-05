<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstadoDocumentoComercialRequest;
use App\Http\Requests\UpdateEstadoDocumentoComercialRequest;
use App\Http\Resources\Admin\EstadoDocumentoComercialResource;
use App\Models\EstadoDocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstadoDocumentoComercialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estado_documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EstadoDocumentoComercialResource(EstadoDocumentoComercial::all());
    }

    public function store(StoreEstadoDocumentoComercialRequest $request)
    {
        $estadoDocumentoComercial = EstadoDocumentoComercial::create($request->all());

        return (new EstadoDocumentoComercialResource($estadoDocumentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        abort_if(Gate::denies('estado_documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EstadoDocumentoComercialResource($estadoDocumentoComercial);
    }

    public function update(UpdateEstadoDocumentoComercialRequest $request, EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        $estadoDocumentoComercial->update($request->all());

        return (new EstadoDocumentoComercialResource($estadoDocumentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        abort_if(Gate::denies('estado_documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDocumentoComercial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
