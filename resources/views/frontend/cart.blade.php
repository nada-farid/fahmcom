@extends('layouts.frontend')
    
  @section('content')

<div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">سلة التسوق</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a  href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">سلة التسوق</li>
              </ol>
    </nav>
    </div>
    </div>
</div>    

</div>
    
    
<div class="cart-page-section general-subsection section-padding2">
    <div class="container">
        <div class="row wrap-div">
            <div class="table-wrap">
              <table id="cart-table">
              <thead>
                <tr>
                  <th scope="col">المنتج</th>
                  <th scope="col"></th>
                  <th scope="col">حذف</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productCarts as  $productCart)
                <tr>
                <td class="table-product" data-label="المنتج">
                        <div class="table-product-thumbnail">
                            <img src="{{$productCart->product->photo->getUrl('preview2') }}">
                        </div>
                </td> 
                <td class="" data-label="">
                   <h6 class="product-name">{{$productCart->product->name  }}</h6>   
                </td>
                  <td class="" data-label="حذف">
                      <a href="{{route('frontend.cart.delete',$productCart->id) }}"><i class="fa-solid fa-x delete-from-cart-btn"></i></a>
                    </td>
                </tr>                    
                @endforeach

              </tbody>
            
            </table> 
            </div>
            <a class="btn btn-default shadow-none send-req-btn cart-btn" href="{{route('frontend.order_form')}}">تنفيذ الطلب</a>

        </div>
        </div>
    </div>    
    @endsection