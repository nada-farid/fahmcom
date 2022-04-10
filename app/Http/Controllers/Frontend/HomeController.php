<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactuRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Contactu;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Product;
use App\Models\User;
use Auth;
use Alert;

class HomeController extends Controller
{
    //
    public function home(){

        $sliders=Slider::get();
        $setting=Setting::first();
        $products=Product::get()->take(30);

        return view('frontend.home',compact('sliders','setting','products'));
    }
    public function contact(StoreContactuRequest $request){

        $contactu = Contactu::create($request->all());

        Alert::success('تم ارسال الطلب بنجاح','سيتم التواصل معك قريبا');  

        return redirect()->route('frontend.home');
    }

    public function register(StoreUserRequest $request)
    {
        $user = User::create([
                'email'=>$request->email,
                'password'=>bcrypt($request->email),
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'city_id'=>$request->city_id,
                'agree'=>$request->agree,
                'user_type'=>'staff',
                
        ]);
       
        Alert::success('تم بنجاح ' );  
        Auth::login($user);
        return redirect()->route('frontend.home');

    }
    public function updateProfile(UpdateUserRequest $request)
    {
        $user=Auth::user();

        $user->update($request->all());

        Alert::success('تم بنجاح ' );  
        return redirect()->route('frontend.home');

    }
    
}