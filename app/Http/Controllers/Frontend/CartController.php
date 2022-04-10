<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCart;
use Auth;
use Alert;

class CartController extends Controller
{
    //
    public function store(Request $request){

        $user=Auth::user();
        $cart = ProductCart::where('product_id',$request->product_id)->where('user_id',$user->id)->first();
        
        if($cart){
            Alert::error('تم  اضافة المنتج من قبل');
            return redirect()->route('frontend.home');
        }

        $cart=ProductCart::create([

            'user_id'=>$user->id,
            'product_id'=>$request->product_id,
        ]);

        if($cart)
        {
            Alert::success('تم  اضافة الطلب بنجاح');

        return redirect()->route('frontend.home');
        }

    }
     public function index(){

        $user = Auth::user();
        $productCarts = ProductCart::with('product')->where('user_id',$user->id)->orderBy('created_at','desc')->get();

        return view('frontend.cart',compact('productCarts'));

     }
     public function delete($id){

        $productCart = ProductCart::findOrfail($id);
         $productCart->delete();

         Alert::success('تم  حذف المنتج بنجاح');

         return redirect()->route('frontend.cart');

     }
}
