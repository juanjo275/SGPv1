<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProveedoreRequest;
use App\Http\Requests\UpdateProveedoreRequest;
use App\Http\Resources\Admin\ProveedoreResource;
use App\Models\Proveedore;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProveedoresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('proveedore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProveedoreResource(Proveedore::with(['cuenta_bancaria', 'created_by'])->get());
    }

    public function store(StoreProveedoreRequest $request)
    {
        $proveedore = Proveedore::create($request->all());

        return (new ProveedoreResource($proveedore))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Proveedore $proveedore)
    {
        abort_if(Gate::denies('proveedore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProveedoreResource($proveedore->load(['cuenta_bancaria', 'created_by']));
    }

    public function update(UpdateProveedoreRequest $request, Proveedore $proveedore)
    {
        $proveedore->update($request->all());

        return (new ProveedoreResource($proveedore))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Proveedore $proveedore)
    {
        abort_if(Gate::denies('proveedore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proveedore->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
