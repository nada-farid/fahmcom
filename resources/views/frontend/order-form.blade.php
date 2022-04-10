@extends('layouts.frontend')
    
  @section('content')
<div class="hero-section-subpage-inner">
        <div class="container">
        <div class="subpage-header">
        <h3 class="page-name">معلومات الطلب</h3>
        <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">معلومات الطلب</li>
                  </ol>
        </nav>
        </div>
        </div>
    </div>    
    
    </div>
       
        
    <div class="service-request-page section-padding2">
        <div class="container">
            <div class="row">
                <div class="service-request-inner">
                <h1 class="title title-center">
                        <img class="title-before" src="{{ asset('frontend/img/titles-before-icon.png') }}">
                        معلومات الطلب 
                </h1>
                <form class="request-service-form" method="Post" action="{{route('frontend.order.store') }}">
                  @csrf
                  @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-line">
                    <div class="form-group half-form">
                      <label for="usr">الاسم:</label>
                      <input type="text" class="form-control shadow-none" name="name" id="usr" required>
                      <input type="hidden" value="{{Auth::id() }}" name="user_id">
                    </div>
                    <div class="form-group half-form">
                     <label for="email">البريد الالكتروني</label>
                    <input type="email" class="form-control shadow-none"   name ="email" id="email" required>
                    </div>
                    </div>
                    <div class="form-line">
                    <div class="form-group half-form">
                      <label for="usr">الهاتف:</label>
                      <input type="number" class="form-control shadow-none"  name ="phone" id="phone" required>
                    </div>
                    <div class="form-group half-form">
                      <label for="email">المدينه</label>
                         <div class="custom-select request-service-select">
                             <select class="form-control select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                                 @foreach(\App\Models\City::Pluck('name','id') as $id => $entry)
                                     <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                     @endforeach
                             </select>
                         </div>
                     </div>
                    </div>
                    <div class="form-line">
                      <div class="form-group half-form">
                        <label for="address">العنوان:</label>
                         <textarea class="form-control shadow-none" rows="7"  class="form-control shadow-none"    name ="address" id="address" required></textarea>
                       </div>
                    <div class="form-group half-form">
                      <label for="comment">ملاحظات اضافية</label>
                      <textarea class="form-control shadow-none" rows="7"   name ="extra_info" id="comment"></textarea>
                    </div>
                    </div>

                     <button type="submit" class="btn btn-default shadow-none send-req-btn">ارسال الطلب</button>
    
                </form>
                
                </div>
            </div>
        </div>     
    </div>    
    @endsection