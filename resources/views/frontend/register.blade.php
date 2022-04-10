@extends('layouts.frontend')
    
  @section('content')
   
  <div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">تسجيل</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل </li>
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
                    تسجيل
            </h1>
            <form class="request-service-form" action="{{route('frontend.register_store') }}" method="Post">
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
                  <label for="usr">الاسم بالكامل:</label>
                  <input type="text" class="form-control shadow-none" name="name" id="usr" required>
                </div>
                <div class="form-group half-form">
                    <label for="email">البريد الالكتروني</label>
                    <input type="email" class="form-control shadow-none" name="email" id="email" required>
                </div>
                </div>
                <div class="form-line">
                <div class="form-group half-form">
                    <label for="usr">الهاتف:</label>
                    <input type="number" class="form-control shadow-none"  name="phone" id="phone" required>
                </div>
                <div class="form-group half-form">
                    <label for="city">المدينة</label>
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
                    <input type="text" class="form-control shadow-none" name="address" id="address" required>
                </div>
                <div class="form-group half-form">
                    <label for="psw2">كلمة السر:</label>
                    <input type="password" class="form-control shadow-none" name="password" id="psw2" required>
                </div>
                </div>
               <!-- <div class="form-line">
                <div class="form-group half-form">
                    <label for="psw3">اعادة ادخال كلمة السر:</label>
                    <input type="password" class="form-control shadow-none" name="password_confirmation"  id="psw3" required>
                </div>
                <div class="form-group half-form">
                 
                </div>
                </div>-->
                <div class="accept-cond">
                <label class="checkbox-search checkbox-signup">
                  <input type="checkbox" name="agree" value="1">
                  <span class="checkmark"></span>
                أوافق على 
                الشروط و الأحكام
                </label>
                </div>
                 <button type="submit" class="btn btn-default shadow-none send-req-btn"> تسجيل</button>
                         <p class="no-acount have-account"> لديك حساب؟
                            <a href="{{route('frontend.login') }}">تسجيل الدخول</a>
                        </p>
            </form>
            
            </div>
        </div>
    </div>     
</div>   
   

  @endsection