<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProveedoreRequest;
use App\Http\Requests\StoreProveedoreRequest;
use App\Http\Requests\UpdateProveedoreRequest;
use App\Models\CuentaBancarium;
use App\Models\Proveedore;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProveedoresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('proveedore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proveedores = Proveedore::with(['cuenta_bancaria', 'created_by'])->get();

        return view('admin.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        abort_if(Gate::denies('proveedore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuenta_bancarias = CuentaBancarium::all()->pluck('cbu', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.proveedores.create', compact('cuenta_bancarias'));
    }

    public function store(StoreProveedoreRequest $request)
    {
        $proveedore = Proveedore::create($request->validated());

        return redirect()->route('admin.proveedores.index');
    }

    public function edit(Proveedore $proveedore)
    {
        abort_if(Gate::denies('proveedore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuenta_bancarias = CuentaBancarium::all()->pluck('cbu', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proveedore->load('cuenta_bancaria', 'created_by');

        return view('admin.proveedores.edit', compact('cuenta_bancarias', 'proveedore'));
    }

    public function update(UpdateProveedoreRequest $request, Proveedore $proveedore)
    {
        $proveedore->update($request->validated());

        return redirect()->route('admin.proveedores.index');
    }

    public function show(Proveedore $proveedore)
    {
        abort_if(Gate::denies('proveedore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proveedore->load('cuenta_bancaria', 'created_by');

        return view('admin.proveedores.show', compact('proveedore'));
    }

    public function destroy(Proveedore $proveedore)
    {
        abort_if(Gate::denies('proveedore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proveedore->delete();

        return back();
    }

    public function massDestroy(MassDestroyProveedoreRequest $request)
    {
        Proveedore::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
