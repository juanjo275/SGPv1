<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentoComercialRequest;
use App\Http\Requests\StoreDocumentoComercialRequest;
use App\Http\Requests\UpdateDocumentoComercialRequest;
use App\Models\DocumentoComercial;
use App\Models\EstadoDocumentoComercial;
use App\Models\TipoDocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentoComercialController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoComercials = DocumentoComercial::with(['tipo_documento_comercial', 'estado_documento_comercials', 'created_by', 'media'])->get();

        return view('admin.documentoComercials.index', compact('documentoComercials'));
    }

    public function create()
    {
        abort_if(Gate::denies('documento_comercial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipo_documento_comercials = TipoDocumentoComercial::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estado_documento_comercials = EstadoDocumentoComercial::all()->pluck('descripcion', 'id');

        return view('admin.documentoComercials.create', compact('tipo_documento_comercials', 'estado_documento_comercials'));
    }

    public function store(StoreDocumentoComercialRequest $request)
    {
        $documentoComercial = DocumentoComercial::create($request->validated());
        $documentoComercial->estado_documento_comercials()->sync($request->input('estado_documento_comercials', []));

        if ($request->input('adjunto', false)) {
            $documentoComercial->addMedia(storage_path('tmp/uploads/' . basename($request->input('adjunto'))))->toMediaCollection('adjunto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentoComercial->id]);
        }

        return redirect()->route('admin.documento-comercials.index');
    }

    public function edit(DocumentoComercial $documentoComercial)
    {
        abort_if(Gate::denies('documento_comercial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipo_documento_comercials = TipoDocumentoComercial::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estado_documento_comercials = EstadoDocumentoComercial::all()->pluck('descripcion', 'id');

        $documentoComercial->load('tipo_documento_comercial', 'estado_documento_comercials', 'created_by');

        return view('admin.documentoComercials.edit', compact('tipo_documento_comercials', 'estado_documento_comercials', 'documentoComercial'));
    }

    public function update(UpdateDocumentoComercialRequest $request, DocumentoComercial $documentoComercial)
    {
        $documentoComercial->update($request->validated());
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

        return redirect()->route('admin.documento-comercials.index');
    }

    public function show(DocumentoComercial $documentoComercial)
    {
        abort_if(Gate::denies('documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoComercial->load('tipo_documento_comercial', 'estado_documento_comercials', 'created_by');

        return view('admin.documentoComercials.show', compact('documentoComercial'));
    }

    public function destroy(DocumentoComercial $documentoComercial)
    {
        abort_if(Gate::denies('documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentoComercial->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentoComercialRequest $request)
    {
        DocumentoComercial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documento_comercial_create') && Gate::denies('documento_comercial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentoComercial();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
