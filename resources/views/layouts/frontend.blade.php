<html><head>
	<title>فحم كوم</title>
	<meta charset="utf-8">
    <link rel="icon" href="img/icon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--style css-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/style.css') }}">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    
<!---fontawesome--->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"  href="{{asset('frontend/assets/all.css')}}">

<!--bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
 
    
<!---owl-carousel---->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">    
    
    
<!----google-fonts---->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    
<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!--java scripts-->
	<script src="{{asset('frontend/js/myScript.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/multi-animated-counter.js')}}"></script>

    </head>

    @yield('style')

<body>
    @php
     
       $setting=\App\Models\Setting::first();
    @endphp
	<div class="main-container">
    <div class="hero-section">
	<header>
       <nav id="myNavbar" class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <button id="toggle-btn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('frontend.home') }}"><img class="logo" src="{{asset('frontend/img/logo.png')}}"></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('frontend.home') }}">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('frontend.about') }}">نبذة عنا</a>
                            </li>
                            <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    خدماتنا
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item"  href="{{ route('frontend.services')}}">تصفح الخدمات</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.request-service') }}">طلب خدمة</a></li>
                                  </ul>
                                </li>
                                @foreach (\App\Models\ProductCategory::get() as $category )
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $category ->name  }}
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('frontend.products',$category->id) }}">جميع منتجات   {{ $category ->name  }} </a></li>
                               <!-- <li><a class="dropdown-item" href="#">لوريم ايبسم</a></li>-->
                              </ul>
                            </li>               
                            @endforeach
                              <li class="nav-item">
                              <a class="nav-link" href="{{ route('frontend.contact_us') }}">تواصل معنا</a>
                            </li>
                          </ul>
                        <div class="navbar-icons">
                            <div class="search-container">
                              <form action="{{route('frontend.search') }}" method="get">
                                @csrf
                                <input class="search" id="searchleft" type="search" name="letters" placeholder="ابحث عن منتج....">
                                <label class="button searchbutton" for="searchleft">                                
                                    <img src="{{asset('frontend/img/search-icon.png')}}">
                                  </label>
                              </form>
                            </div>
                            <a class="navbar-icon-inner" href="{{route('frontend.cart') }}">
                                <img src="{{asset('frontend/img/cart-icon.png')}}">
                            </a> 
                            <a class="navbar-icon-inner" href="{{ route('frontend.profile') }}">
                                <img  src="{{asset('frontend/img/account-icon.png')}}">
                            </a>    
                        </div>
            </div>
          </div>
        </nav>
	</header> 
    @yield('content')

    <div class="footer section-padding">
        <div class="container">
            <div class="row footer-inner">
                <div class="col-lg-5 col-md-6">
                    <p class="p-footer">نبذة عنا </p>
                    <p class="p-footer"> {{$setting->about_us ??''}} </p>
                                    </div>
                <div class="col-lg-3 col-md-6">
                     <p class="p-footer">تواصل معنا</p>
                    <a class="footer-link" href="tel:  {{$setting->phone ??''}} ">
                    <i class="fa-solid fa-phone-volume"></i>
                    {{$setting->phone ??''}}   
                    </a>
                    <a class="footer-link" href="mailto: {{$setting->email ??''}}">
                    <i class="fa-solid fa-envelope"></i>
                     {{$setting->email ??''}}    
                    </a>
                    <a class="footer-link" href=" {{$setting->website ??''}}   ">
                    <i class="fa-solid fa-globe"></i>  
                     {{$setting->website ??''}}   
                    </a>
                
                <div class="social-media-icons">
                            <a class="grow" href="{{$setting->twitter ??''}}"><i class="fa-brands fa-twitter"></i></a>
                            <a class="grow" href="{{$setting->facebook ??''}}"><i class="fa-brands fa-facebook-square"></i></a>
                            <a class="grow" href="{{$setting->instagram ??''}}"><i class="fa-brands fa-instagram"></i></a>
                            <a class="grow" href="{{$setting->youtube ??''}}"><i class="fa-brands fa-youtube"></i></a>
                            <a class="grow" href="{{$setting->whatsapp ??''}}"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
                
                </div>
                <div class="col-lg-4 col-md-6 footer-img-wrap">
                  @if($setting->footer_image)
                    <img class="footer-img" src="{{  $setting->footer_image->getUrl()  }}">
                    @endif
                </div>
            </div>
            
            <div class="row">
            
            <div class="footer-credits">
              <a href="https://alliance-sa.com/index_ar">
                    جميع الحقوق محفوظة 2022 - تصميم وبرمجة تحالف الرؤى
                </a>
            </div>
            </div>
        </div>
        
    </div>
    
     
    </div>
<!----end of main container----->
@include('sweetalert::alert')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.owl-one').owlCarousel({
    center: true,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:5000,
    nav:true,
    dots:false,
    rtl:true,
    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1120:{
            items:1
        }
    }
})
</script>
<script>
$('.owl-two').owlCarousel({
    center: false,
    loop:true,
    autoplayHoverPause:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:5000,
    nav:true,
    dots:false,
    rtl:true,
    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1120:{
            items:3
        }
    }
})
</script>
<script>
/* $(".add-to-cart-btn").click(function () {
           /* $(this).find(".add-cart-p").text(function(i, v){
               return v === 'تمت اضافة المنتج' ? 'أضف إلمنتج' : 'تمت اضافة المنتج'
            })*/
            /*
        event.preventDefault();
        var product_id = $("#product_id").val();
      
        $.ajax({
            type: 'POST',
            url: "{{ route('frontend.carts.store')}}",
            data:{
                 'product_id':product_id,
            },
            success: function(){alert('success');}
        });
    });
       */
</script>
</body>
</html>