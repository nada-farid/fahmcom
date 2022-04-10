<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\ProductCart;
use App\Models\OrderProduct;
use Auth;
use Alert;

class OrderController extends Controller
{
    //
    public function store(StoreOrderRequest $request){
        $order = Order::create($request->all());
        $user = Auth::user();

        $productCarts = ProductCart::where('user_id',$user->id)->get();

        if($productCarts){
            foreach($productCarts as $cart){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                
                ]);
            
            }
            ProductCart::where('user_id',$user->id)->delete();
        }

        Alert::success('تم الطلب بنجاح');
        return redirect()->route('frontend.home');
    }
}
