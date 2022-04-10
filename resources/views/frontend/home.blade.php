@extends('layouts.frontend')
    
  @section('content')
  <div class="hero-section-inner1">
    <div class="container-fluid">
        <div class="section1">
         <div class="owl-one owl-carousel owl-theme owl-container">
             @foreach ($sliders as $slider )
            <div class="item">
                <img src="{{ $slider->photo->getUrl('preview2')}}">
                <div class="slider-describtion">
            {{$slider->description }}                </div>
            </div> 
            @endforeach   
        </div>
        </div>
    </div>
</div>
    
<div class="hero-section-inner2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 about-text-wrap">
                <h1 class="title title-right">
                  
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    نبذة عنا
                </h1>
                <p class="p-text1">
                    {{$setting->about_us }}
                </p>
            </div>
            <div class="col-lg-5 about-img-wrap">
                <div class="img-container">
                    @if($setting->about_image)
                    <img  src="{{ $setting->about_image->getUrl('about')}}">
                    @endif
                </div>
            </div>
        </div>
    </div>    
</div>
    
</div>
    
 <div class="products-section section-padding">
    <div class="container">
        <div class="row">
             <h1 class="title title-center">
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    منتجاتنا
            </h1>
            <div class="product-slider-wrap">
                <div class="owl-two owl-carousel owl-theme owl-container">
                    @foreach ($products as $product )
                    <div class="item"> 
                        <div class="product-item">
                            <a href="{{route('frontend.product_details',$product->id) }}">
                            <div class="product-img">

                                <img src="{{$product->photo->getUrl('preview2') }}">
                            </div>
                                 <h6 class="product-name">{{$product->name }}</h6></a>
                            <div class="product-input">
                                <div class="product-add-quantity">
                                    
                                    <form id="from" action="{{ route('frontend.carts.store')}}" method="Post">
                                        @csrf
                              <input type="hidden" name="product_id" value="{{ $product->id }}" id="product_id">
                                <a class="btn add-to-cart-btn">
                                  <i class="fa-solid fa-cart-plus basket-add"></i>
                                    <button type="submit" class="add-cart-p">اضف المنتج</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>   
          
        @endforeach           
                </div>  
            </div>
        </div>
     </div>
    </div>
             
    
    
<div class="counter-section section-padding">
<div class="container">
        <div class="row">
             <h1 class="title title-center white-title">
                    <img class="title-before"  src="{{asset('frontend/img/titles-before-icon-blue.png')}}">
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
    
    
<div class="how-to-order section-padding">
<div class="container">
        <div class="row">
             <h1 class="title title-center">
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    آلية الطلب
            </h1>
            <img class="how-to-order-img" src="{{$setting->order_way->getUrl('') }}">
    </div>
</div>
</div>
    

  @endsection