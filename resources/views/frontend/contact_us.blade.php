@extends('layouts.frontend')
    
  @section('content')
  <div class="contact-us-page-section section-padding2">
    <div class="container">
        <div class="row wrap-div">
        <h1 class="title title-center">
                    <img class="title-before" src="{{asset('frontend/img/titles-before-icon.png')}}">
                    تواصل معنا
            </h1>
            @php
                    $setting=\App\Models\Setting::first();
                @endphp 
            <p class="p2-center">
                 {{$setting->whatsapp }}
            </p>
            <div class="row wrap-div-inner">
                <div class="col-lg-4">
                    <div class="contact-us-inner">
                        <div class="contact-us-part">
                        <i class="fa-solid fa-envelope"></i>
                        <div><p>البريد الاكتروني</p>
                        <a href="mailto:   {{$setting->email }}">   {{$setting->email }}</a></div>
                        </div>
                        <div class="contact-us-part">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <div><p>الهاتف</p>
                        <a href="tel:+{{$setting->phone }}">{{$setting->phone }}</a></div>
                        </div>
                        <div class="contact-us-part social-media-part">
                            <div class="social-media-part2">   
                            <div class="social-media-part-inner">
                                    <a href="{{$setting->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="{{$setting->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    </div>
                                <div>
                                <p>التواصل الاجتماعي</p>
                                <p>{{$setting->website }}</p>
                                </div>
                                <div class="social-media-part-inner">
                                    <a  href="{{$setting->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                                    <a  href="{{$setting->snapchat }}"><i class="fa-brands fa-snapchat"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                    <form class="request-service-form contact-us-form" action="{{route('frontend.store_contact') }}" method="POST">
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
                            <div class="form-group">
                              <label for="usr">الاسم:</label>
                              <input type="text" class="form-control shadow-none" name="name" id="usr" required>
                            </div>
                        </div>
                        <div class="form-line">
                            <div class="form-group">
                              <label for="email">البريد الالكتروني</label>
                                <input type="email" class="form-control shadow-none"  name="email"  id="email" required>
                            </div>
                        </div>
                <div class="form-line">
               <div class="form-group">
                  <label for="comment">الرسالة</label>
                  <textarea class="form-control shadow-none" rows="7"  name="message"  id="comment"></textarea>
                </div>
                </div>

                 <button type="submit" class="btn btn-default shadow-none send-req-btn contact-us-btn">ارسال</button>

                    </form>
                </div>
            </div>
        
        </div>
    </div>    
</div>

  @endsection