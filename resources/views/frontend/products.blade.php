@extends('layouts.frontend')
    
  @section('content')
  <div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">منتجاتنا</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a  href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name }}</li>
              </ol>
    </nav>
    </div>
    </div>
</div>    

</div>
    

<div class="products-page section-padding2">
    <div class="container">
        <div class="row">
            @foreach ($products as $product )
            <div class="col-lg-4 col-md-6">
                    <div class="product-item">
                         <a href="{{route('frontend.product_details',$product->id) }}">
                        <div class="product-img">
                            <img src="{{$product->photo->getUrl('preview2') }}">
                        </div>
                             <h6 class="product-name">{{$product->name }}</h6></a>
                             <div class="product-input">
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
    @endforeach             
            <nav class="products-nav">
              <ul class="pagination">
                {{$products->links() }}
              </ul>
            </nav>
        </div>
    </div>
</div>



  @endsection