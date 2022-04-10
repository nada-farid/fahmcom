@extends('layouts.frontend')
    
  @section('content')

<div class="about-page-section1 section-padding2">
    <div class="container">
        <div class="row">
        <div class="col-lg-7 about-text-wrap">
                <p class="p-text1 p-black">
                    {{$setting->description	 }}
                </p>
                
            </div>
            <div class="col-lg-5 about-img-wrap">
                <div class="img-container">
                    @if($setting->about_image)
                    <img  src="{{ $setting->about_image->getUrl('about2')}}">
                    @endif
                </div>
            </div>
        </div>
    </div>    
</div>   
    
    
<div class="about-page-section2 section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-container2">
                    <img src="{{$setting->about_2_imag->getUrl('')}}">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="subtitle">خدمة العميل النهائي</h2>
                <div class="about2-services-wrap">
                    @foreach ($services as $key => $service ) 
                    <div class="client-service">
                        <div class="client-service-icon"><img src="{{$service->icon->getUrl() }}"></div>
                        <p>{{$service->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="counter-section about-page-section3 section-padding">
<div class="container">
        <div class="row">
             <h1 class="title title-center white-title">
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon-blue.png')}}">
                    فحمكم في ارقام
            </h1>
 
            <div class="counter-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-div">
                        <img class="counter-icon"  src="{{asset('frontend/img/counter-icon1.png')}}">
                        <div id="counters_1">
                      <div class="counter" 
                           data-TargetNum="{{ $setting->supportive_partner}}"
                           data-Easing="linear">
                      </div>
                    </div>
                    <p class="counter-text">داعم وشريك</p>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-div">
                        <img class="counter-icon" src="{{asset('frontend/img/counter-icon2.png')}}">
                        <div id="counters_2">
                      <div class="counter" 
                           data-TargetNum="{{ $setting->product}}"
                           data-Easing="linear">
                      </div>
                    </div>
                    <p class="counter-text">منتج</p>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-div">
                        <img class="counter-icon" src="{{asset('frontend/img/counter-icon3.png')}}">
                        <div id="counters_3">
                      <div class="counter" 
                           data-TargetNum="{{ $setting->service}}"
                           data-Easing="linear">
                      </div>
                    </div>
                    <p class="counter-text">خدمة</p>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-div">
                        <img class="counter-icon"  src="{{asset('frontend/img/counter-icon4.png')}}">
                        <div id="counters_4">
                      <div class="counter" 
                           data-TargetNum="{{ $setting->experience_year}}"
                           data-Easing="linear">
                      </div>
                    </div>
                    <p class="counter-text">عام من الخبرة</p>
                    </div>
                </div>
                </div>
            </div>
    </div>
</div>    
</div>
@endsection