<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipoDocumentoComercialRequest;
use App\Http\Requests\StoreTipoDocumentoComercialRequest;
use App\Http\Requests\UpdateTipoDocumentoComercialRequest;
use App\Models\TipoDocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoDocumentoComercialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipo_documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDocumentoComercials = TipoDocumentoComercial::all();

        return view('admin.tipoDocumentoComercials.index', compact('tipoDocumentoComercials'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipo_documento_comercial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoDocumentoComercials.create');
    }

    public function store(StoreTipoDocumentoComercialRequest $request)
    {
        $tipoDocumentoComercial = TipoDocumentoComercial::create($request->validated());

        return redirect()->route('admin.tipo-documento-comercials.index');
    }

    public function edit(TipoDocumentoComercial $tipoDocumentoComercial)
    {
        abort_if(Gate::denies('tipo_documento_comercial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoDocumentoComercials.edit', compact('tipoDocumentoComercial'));
    }

    public function update(UpdateTipoDocumentoComercialRequest $request, TipoDocumentoComercial $tipoDocumentoComercial)
    {
        $tipoDocumentoComercial->update($request->validated());

        return redirect()->route('admin.tipo-documento-comercials.index');
    }

    public function show(TipoDocumentoComercial $tipoDocumentoComercial)
    {
        abort_if(Gate::denies('tipo_documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoDocumentoComercials.show', compact('tipoDocumentoComercial'));
    }

    public function destroy(TipoDocumentoComercial $tipoDocumentoComercial)
    {
        abort_if(Gate::denies('tipo_documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDocumentoComercial->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipoDocumentoComercialRequest $request)
    {
        TipoDocumentoComercial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
