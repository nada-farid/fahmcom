@extends('layouts.frontend')
    
  @section('content')
<div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">طلب خدمة</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a  href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">طلب خدمة</li>
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
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    طلب خدمة
            </h1>
            <p class="p2-center">
                {{$setting->service_text }}  
            </p>
            <form class="request-service-form" action="{{route('frontend.store_service_request') }}" method="POST">
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
                </div>
                <div class="form-group half-form">
                 <label for="email">البريد الالكتروني</label>
                <input type="email" class="form-control shadow-none"  name="email" id="email" required>
                </div>
                </div>
                <div class="form-line">
                <div class="form-group half-form">
                  <label for="usr">الهاتف:</label>
                  <input type="number" class="form-control shadow-none"   name="phone" id="phone" required>
                </div>
                <div class="form-group half-form">
                 <label for="email">نوع الخدمة</label>
                    <div class="custom-select request-service-select">
                        <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                            @foreach($services as $id => $entry)
                                <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                </div>
                <div class="form-line">
               <div class="form-group">
                  <label for="comment">ملاحظات اضافية</label>
                  <textarea class="form-control shadow-none" rows="7"  name="extra_info" id="comment"></textarea>
                </div>
                </div>

                 <button type="submit" class="btn btn-default shadow-none send-req-btn">ارسال الطلب</button>

            </form>
            
            </div>
        </div>
    </div>     
</div>    
@endsection