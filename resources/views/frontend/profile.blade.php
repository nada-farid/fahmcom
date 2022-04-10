@extends('layouts.frontend')
    
  @section('content')
<div class="hero-section-subpage-inner">
    <div class="container">
    <div class="subpage-header">
    <h3 class="page-name">الصفحة الشخصية</h3>
    <nav aria-label="breadcrumb" class="page-breadcrumb" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الصفحة الشخصية</li>
              </ol>
    </nav>
    </div>
    </div>
</div>    

</div>
    
    
<div class="general-subsection section-padding2">
    <div class="container">
        <div class="row wrap-div">
           <div class="col-lg-4">
                <div class="account-wrap">
                    <div class="user-thumbnail">
                        <img src="{{asset('frontend/img/user-thumbnail.png')}}">
                    </div>
                    <div class="user-info">
                        <h5 class="user-name">{{Auth::user()->name }}</h5>
                        <a class="btn sign-out-btn shadow-none"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">تسجيل الخروج</a>
                    </div>
                    <div class="user-accout-links">
                        <a href="#">البيانات الشخصية</a>
                        <a href="#">متابعة الطلبـــــــــات</a>
                    </div>
               </div>
            </div>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <div class="col-lg-8">
                <form action="{{route('frontend.update_profile') }}" method="Post">
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
                <div class="user-information-wrap">
                <p class="user-info-label">الاسم</p>
                <input type="text" class="form-control shadow-none user-info-data" id="usr"name="name" value="{{Auth::user()->name }}" required>
                <p class="user-info-label">الاسم</p>
                <input type="text" class="form-control shadow-none user-info-data" id="usr"name="email" value="{{Auth::user()->email }}" required>
                <p class="user-info-label">كلمة المرور</p>
                  <input type="password" class="form-control shadow-none user-info-data" name="passsword" id="psw2" >
                  <p class="user-info-label">الهاتف</p>
                  <input type="text" class="form-control shadow-none user-info-data" id="psw2" name="phone" value="{{Auth::user()->phone }}" required>
                
                  <button class="btn edit-info-btn shadow-none" type="submit">تعديل</button>
                </form>
               </div>
            </div>
        </div>
        </div>
    </div>    
   
        </div>
        </div>
    </div>   
    @endsection