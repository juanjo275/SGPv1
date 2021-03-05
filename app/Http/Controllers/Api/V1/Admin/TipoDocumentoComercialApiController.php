<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoDocumentoComercialRequest;
use App\Http\Requests\UpdateTipoDocumentoComercialRequest;
use App\Http\Resources\Admin\TipoDocumentoComercialResource;
use App\Models\TipoDocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoDocumentoComercialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipo_documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipoDocumentoComercialResource(TipoDocumentoComercial::all());
    }

    public function store(StoreTipoDocumentoComercialRequest $request)
    {
        $tipoDocumentoComercial = TipoDocumentoComercial::create($request->all());

        return (new TipoDocumentoComercialResource($tipoDocumentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TipoDocumentoComercial $tipoDocumentoComercial)
    {
        abort_if(Gate::denies('tipo_documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TipoDocumentoComercialResource($tipoDocumentoComercial);
    }

    public function update(UpdateTipoDocumentoComercialRequest $request, TipoDocumentoComercial $tipoDocumentoComercial)
    {
        $tipoDocumentoComercial->update($request->all());

        return (new TipoDocumentoComercialResource($tipoDocumentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TipoDocumentoComercial $tipoDocumentoComercial)
    {
        abort_if(Gate::denies('tipo_documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDocumentoComercial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
