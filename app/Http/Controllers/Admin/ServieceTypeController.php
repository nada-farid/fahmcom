<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServieceTypeRequest;
use App\Http\Requests\StoreServieceTypeRequest;
use App\Http\Requests\UpdateServieceTypeRequest;
use App\Models\ServieceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServieceTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('serviece_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servieceTypes = ServieceType::all();

        return view('admin.servieceTypes.index', compact('servieceTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('serviece_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servieceTypes.create');
    }

    public function store(StoreServieceTypeRequest $request)
    {
        $servieceType = ServieceType::create($request->all());

        return redirect()->route('admin.serviece-types.index');
    }

    public function edit(ServieceType $servieceType)
    {
        abort_if(Gate::denies('serviece_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.servieceTypes.edit', compact('servieceType'));
    }

    public function update(UpdateServieceTypeRequest $request, ServieceType $servieceType)
    {
        $servieceType->update($request->all());

        return redirect()->route('admin.serviece-types.index');
    }

    public function show(ServieceType $servieceType)
    {
        abort_if(Gate::denies('serviece_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servieceType->load('typeOurServices');

        return view('admin.servieceTypes.show', compact('servieceType'));
    }

    public function destroy(ServieceType $servieceType)
    {
        abort_if(Gate::denies('serviece_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servieceType->delete();

        return back();
    }

    public function massDestroy(MassDestroyServieceTypeRequest $request)
    {
        ServieceType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
