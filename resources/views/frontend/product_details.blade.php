@extends('layouts.frontend')
    
  @section('content')
<div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">{{$product->name }}</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a  href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->category->name }}</li>
              </ol>
    </nav>
    </div>
    </div>
</div>    

</div>
    
<div class="products-page section-padding2">
    <div class="container">
        <div class="row product-card">
            <div class="col-lg-7">
                <div class="product-card-img">
                    <img class="img-fluid" src="{{$product->photo->getUrl('preview2') }}">
                </div>
                <h4 class="product-card-name">{{$product->name }}</h4>
                <p class="product-adv">يتميز المنتج بـ:</p>
                <ol class="procust-card-adv">
                    <li>{{$product->description }}</li>
                </ol>
            </div>
            <div class="col-lg-5 product-card-left-wrap">
                <div class="product-card-left">
                    <form id="from" action="{{ route('frontend.carts.store')}}" method="Post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" id="product_id">
                    <a class="btn add-to-cart-btn product-card-add-btn">
                      <i class="fa-solid fa-cart-plus basket-add"></i>
                        <button type="submit"><p class="add-cart-p">اضف المنتج</p></button>
                    </a>
                    </form>
                    <div class="product-card-price">
                        <p class="no-bought">
                        تم شراءه <span>{{$product->buying_number }}</span> مرة
                        </p>
                    </div>
                    <div class="product-card-social-icons">
                        <a  href="{{$setting->twitter ??''}}"><i class="fa-brands fa-twitter"></i></a>
                        <a  href="{{$setting->facebook ??''}}"><i class="fa-brands fa-facebook-square"></i></a>
                        <a  href="{{$setting->instagram ??''}}"><i class="fa-brands fa-instagram"></i></a>
                        <a  href="{{$setting->whatsapp ??''}}"><i class="fa-brands fa-whatsapp"></i></a>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection