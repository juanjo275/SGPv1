<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBancoRequest;
use App\Http\Requests\StoreBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Models\Banco;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BancosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('banco_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::all();

        return view('admin.bancos.index', compact('bancos'));
    }

    public function create()
    {
        abort_if(Gate::denies('banco_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bancos.create');
    }

    public function store(StoreBancoRequest $request)
    {
        $banco = Banco::create($request->validated());

        return redirect()->route('admin.bancos.index');
    }

    public function edit(Banco $banco)
    {
        abort_if(Gate::denies('banco_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bancos.edit', compact('banco'));
    }

    public function update(UpdateBancoRequest $request, Banco $banco)
    {
        $banco->update($request->validated());

        return redirect()->route('admin.bancos.index');
    }

    public function show(Banco $banco)
    {
        abort_if(Gate::denies('banco_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bancos.show', compact('banco'));
    }

    public function destroy(Banco $banco)
    {
        abort_if(Gate::denies('banco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banco->delete();

        return back();
    }

    public function massDestroy(MassDestroyBancoRequest $request)
    {
        Banco::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
