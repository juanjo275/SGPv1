<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCuentaBancariumRequest;
use App\Http\Requests\StoreCuentaBancariumRequest;
use App\Http\Requests\UpdateCuentaBancariumRequest;
use App\Models\Banco;
use App\Models\CuentaBancarium;
use App\Models\TipoCuentaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CuentaBancariaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cuenta_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuentaBancaria = CuentaBancarium::with(['banco', 'tipo_cuenta', 'created_by'])->get();

        return view('admin.cuentaBancaria.index', compact('cuentaBancaria'));
    }

    public function create()
    {
        abort_if(Gate::denies('cuenta_bancarium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipo_cuentas = TipoCuentaBancarium::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cuentaBancaria.create', compact('bancos', 'tipo_cuentas'));
    }

    public function store(StoreCuentaBancariumRequest $request)
    {
        $cuentaBancarium = CuentaBancarium::create($request->validated());

        return redirect()->route('admin.cuenta-bancaria.index');
    }

    public function edit(CuentaBancarium $cuentaBancarium)
    {
        abort_if(Gate::denies('cuenta_bancarium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipo_cuentas = TipoCuentaBancarium::all()->pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cuentaBancarium->load('banco', 'tipo_cuenta', 'created_by');

        return view('admin.cuentaBancaria.edit', compact('bancos', 'tipo_cuentas', 'cuentaBancarium'));
    }

    public function update(UpdateCuentaBancariumRequest $request, CuentaBancarium $cuentaBancarium)
    {
        $cuentaBancarium->update($request->validated());

        return redirect()->route('admin.cuenta-bancaria.index');
    }

    public function show(CuentaBancarium $cuentaBancarium)
    {
        abort_if(Gate::denies('cuenta_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuentaBancarium->load('banco', 'tipo_cuenta', 'created_by');

        return view('admin.cuentaBancaria.show', compact('cuentaBancarium'));
    }

    public function destroy(CuentaBancarium $cuentaBancarium)
    {
        abort_if(Gate::denies('cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cuentaBancarium->delete();

        return back();
    }

    public function massDestroy(MassDestroyCuentaBancariumRequest $request)
    {
        CuentaBancarium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
