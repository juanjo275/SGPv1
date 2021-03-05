<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentoComercialRequest;
use App\Http\Requests\UpdateDocumentoComercialRequest;
use App\Http\Resources\Admin\DocumentoComercialResource;
use App\Models\DocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentoComercialApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentoComercialResource(DocumentoComercial::with(['tipo_documento_comercial', 'estado_documento_comercials', 'created_by'])->get());
    }

    public function store(StoreDocumentoComercialRequest $request)
    {
        $documentoComercial = DocumentoComercial::create($request->all());
        $documentoComercial->estado_documento_comercials()->sync($request->input('estado_documento_comercials', []));

        if ($request->input('adjunto', false)) {
            $documentoComercial->addMedia(storage_path('tmp/uploads/' . basename($request->input('adjunto'))))->toMediaCollection('adjunto');
        }

        return (new DocumentoComercialResource($documentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentoComercial $documentoComercial)
    {
        abort_if(Gate::denies('documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentoComercialResource($documentoComercial->load(['tipo_documento_comercial', 'estado_documento_comercials', 'created_by']));
    }

    public function update(UpdateDocumentoComercialRequest $request, DocumentoComercial $documentoComercial)
    {
        $documentoComercial->update($request->all());
        $documentoComercial->estado_documento_comercials()->sync($request->input('estado_documento_comercials', []));

        if ($request->input('adjunto', false)) {
            if (!$documentoComercial->adjunto || $request->input('adjunto') !== $documentoComercial->adjunto->file_name) {
                if ($documentoComercial->adjunto) {
                    $documentoComercial->adjunto->delete();
                }

                $documentoComercial->addMedia(storage_path('tmp/uploads/' . basename($request->input('adjunto'))))->toMediaCollection('adjunto');
            }
        } elseif ($documentoComercial->adjunto) {
            $documentoComercial->adjunto->delete();
        }

        return (new DocumentoComercialResource($documentoComercial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentoComercial $documentoComercial)
    {
        abort_if(Gate::denies('documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoComercial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
