<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServieceType;
use App\Models\OurService;
use App\Models\Setting;
use App\Models\ServiceRequest;
use Alert;
use App\Http\Requests\StoreServiceRequestRequest;


class ServiceController extends Controller
{
    //
    public function services(){

        $servieceTypes = ServieceType::all();      
        $servieceTypes->load('typeOurServices');

        $services2=OurService::where('type_id',null)->get();

        return view('frontend.services',compact('servieceTypes','services2'));

    }

    public function serviceRequest(){
 
        $type_id=ServieceType::where('type','خدمة العميل النهائي')->first()->id;


        $services=OurService::where('type_id','!=',$type_id)->OrWhere('type_id',null)->pluck('name','id');
        
        $setting=Setting::first();

        return view('frontend.service-request',compact('setting','services','type_id'));
    }
    public function store(StoreServiceRequestRequest $request)
    {
        $serviceRequest = ServiceRequest::create($request->all());
        
        Alert::success('تم ارسال الطلب بنجاح','سيتم التواصل معك قريبا');  

        return redirect()->route('frontend.home');
    }


}
