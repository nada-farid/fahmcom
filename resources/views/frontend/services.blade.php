@extends('layouts.frontend')
    
  @section('content')

<div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">خدماتنا</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">خدماتنا</li>
              </ol>
    </nav>
    </div>
    </div>
</div>    

</div>
    
    
<div class="services-page-section section-padding2">
    <div class="container">
        <div class="row">
            @foreach ($services2 as $service )  
            <div class="service-wrap">
                <div class="service-icon">
                    <img src="{{ $service->icon->getUrl('')}}"></div>
                <h2 class="subtitle black"> {{ $service->name ?? '' }}</h2>
                    <p> {{ $service->description ?? '' }}</p>
                <a class="btn req-service-btn blue-btn  shadow-none" href="{{ route('frontend.request-service') }}">طلب الخدمة</a>
            </div>
        </div>
        @endforeach
 
        @foreach ($servieceTypes as $service )
      @if($service->type!='خدمة العميل النهائي')
        <div class="row">
           <h2 class="subtitle black subtitle2">{{$service->type }}</h2>
           @foreach($service->typeOurServices as $key => $ourService)
            <div class="col-lg-6">
                <div class="service-wrap2">
                    <div class="service-icon">
                <img src="{{ $ourService->icon->getUrl('')}}"></div>
                    <div class="service-text-wrap">
                    <h2 class="subtitle black"> {{ $ourService->name ?? '' }}</h2>
                    <p> {{ $ourService->description ?? '' }}</p>
                    <a class="btn req-service-btn blue-btn shadow-none" href="{{ route('frontend.request-service') }}">طلب الخدمة</a>
                    </div>
                </div>
            </div> 
      @endforeach
        
        </div>
        @endif       
    @endforeach

    </div>    
</div>
</div>
@endsection