@extends('layouts.frontend')
    
  @section('content')

<div class="contact-us-page-section section-padding2">
    <div class="container">
        <div class="row wrap-div">
        <h1 class="title title-center">
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    تسجيل الدخول
            </h1>
          
            <div class="row wrap-div-inner">
                <div class="col-lg-8 sign-div">
                    <form class="request-service-form contact-us-form"  method="POST" action="{{ route('login') }}">
                       @csrf
                        <div class="form-line">
                            <div class="form-group">
                              <label for="email">البريد الالكتروني:</label>
                              <input type="email" class="form-control shadow-none" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-line">
                            <div class="form-group">
                              <label for="psw">كلمة السر:</label>
                                <input type="password" class="form-control shadow-none" name="password" id="psw" required>
                            </div>
                        </div>
                        <p class="no-acount">ليس لديك حساب؟
                            <a href="{{route('frontend.register') }}">تسجيل</a>
                        </p>
                 <button type="submit" class="btn btn-default shadow-none send-req-btn contact-us-btn">دخول</button>

                    </form>
                </div>
            </div>
        
        </div>
    </div>    
</div>
   @endsection