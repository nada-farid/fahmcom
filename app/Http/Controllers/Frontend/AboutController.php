<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ServieceType;
use App\Models\OurService;


class AboutController extends Controller
{
    //
    public function about(){

        $setting=Setting::first();
        $id=ServieceType::where('type','خدمة العميل النهائي')->first()->id;

        $services=OurService::where('type_id',$id)->get();

        return view('frontend.about',compact('setting','services'));
    }
}
