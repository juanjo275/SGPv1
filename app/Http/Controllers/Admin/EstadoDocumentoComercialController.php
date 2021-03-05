<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstadoDocumentoComercialRequest;
use App\Http\Requests\StoreEstadoDocumentoComercialRequest;
use App\Http\Requests\UpdateEstadoDocumentoComercialRequest;
use App\Models\EstadoDocumentoComercial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstadoDocumentoComercialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estado_documento_comercial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDocumentoComercials = EstadoDocumentoComercial::all();

        return view('admin.estadoDocumentoComercials.index', compact('estadoDocumentoComercials'));
    }

    public function create()
    {
        abort_if(Gate::denies('estado_documento_comercial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estadoDocumentoComercials.create');
    }

    public function store(StoreEstadoDocumentoComercialRequest $request)
    {
        $estadoDocumentoComercial = EstadoDocumentoComercial::create($request->validated());

        return redirect()->route('admin.estado-documento-comercials.index');
    }

    public function edit(EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        abort_if(Gate::denies('estado_documento_comercial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estadoDocumentoComercials.edit', compact('estadoDocumentoComercial'));
    }

    public function update(UpdateEstadoDocumentoComercialRequest $request, EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        $estadoDocumentoComercial->update($request->validated());

        return redirect()->route('admin.estado-documento-comercials.index');
    }

    public function show(EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        abort_if(Gate::denies('estado_documento_comercial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDocumentoComercial->load('estadoDocumentoComercialDocumentoComercials');

        return view('admin.estadoDocumentoComercials.show', compact('estadoDocumentoComercial'));
    }

    public function destroy(EstadoDocumentoComercial $estadoDocumentoComercial)
    {
        abort_if(Gate::denies('estado_documento_comercial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDocumentoComercial->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstadoDocumentoComercialRequest $request)
    {
        EstadoDocumentoComercial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
