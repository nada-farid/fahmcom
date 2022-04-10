<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceRequestRequest;
use App\Http\Requests\StoreServiceRequestRequest;
use App\Http\Requests\UpdateServiceRequestRequest;
use App\Models\ServiceRequest;
use App\Models\ServieceType;
use App\Models\OurService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceRequests = ServiceRequest::with(['service'])->get();

        return view('admin.serviceRequests.index', compact('serviceRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type_id=ServieceType::where('type','خدمة العميل النهائي')->first()->id;

        $services=OurService::where('type_id','!=',$type_id)->OrWhere('type_id',null)->pluck('name','id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.serviceRequests.create', compact('services'));
    }

    public function store(StoreServiceRequestRequest $request)
    {
        $serviceRequest = ServiceRequest::create($request->all());

        return redirect()->route('admin.service-requests.index');
    }

    public function edit(ServiceRequest $serviceRequest)
    {
        abort_if(Gate::denies('service_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type_id=ServieceType::where('type','خدمة العميل النهائي')->first()->id;

        $services=OurService::where('type_id','!=',$type_id)->OrWhere('type_id',null)->pluck('name','id')->prepend(trans('global.pleaseSelect'), '');

        $serviceRequest->load('service');

        return view('admin.serviceRequests.edit', compact('serviceRequest', 'services'));
    }

    public function update(UpdateServiceRequestRequest $request, ServiceRequest $serviceRequest)
    {
        $serviceRequest->update($request->all());

        return redirect()->route('admin.service-requests.index');
    }

    public function show(ServiceRequest $serviceRequest)
    {
        abort_if(Gate::denies('service_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceRequest->load('service');

        return view('admin.serviceRequests.show', compact('serviceRequest'));
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        abort_if(Gate::denies('service_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequestRequest $request)
    {
        ServiceRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
