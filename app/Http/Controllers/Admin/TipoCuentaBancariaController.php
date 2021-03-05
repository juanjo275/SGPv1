<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipoCuentaBancariumRequest;
use App\Http\Requests\StoreTipoCuentaBancariumRequest;
use App\Http\Requests\UpdateTipoCuentaBancariumRequest;
use App\Models\TipoCuentaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoCuentaBancariaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoCuentaBancaria = TipoCuentaBancarium::all();

        return view('admin.tipoCuentaBancaria.index', compact('tipoCuentaBancaria'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoCuentaBancaria.create');
    }

    public function store(StoreTipoCuentaBancariumRequest $request)
    {
        $tipoCuentaBancarium = TipoCuentaBancarium::create($request->validated());

        return redirect()->route('admin.tipo-cuenta-bancaria.index');
    }

    public function edit(TipoCuentaBancarium $tipoCuentaBancarium)
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoCuentaBancaria.edit', compact('tipoCuentaBancarium'));
    }

    public function update(UpdateTipoCuentaBancariumRequest $request, TipoCuentaBancarium $tipoCuentaBancarium)
    {
        $tipoCuentaBancarium->update($request->validated());

        return redirect()->route('admin.tipo-cuenta-bancaria.index');
    }

    public function show(TipoCuentaBancarium $tipoCuentaBancarium)
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoCuentaBancaria.show', compact('tipoCuentaBancarium'));
    }

    public function destroy(TipoCuentaBancarium $tipoCuentaBancarium)
    {
        abort_if(Gate::denies('tipo_cuenta_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoCuentaBancarium->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipoCuentaBancariumRequest $request)
    {
        TipoCuentaBancarium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
