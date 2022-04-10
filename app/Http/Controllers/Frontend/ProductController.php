<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    //
    public function products ($category_id){

        $products=Product::where('category_id',$category_id)->paginate(12);
        
        $category=ProductCategory::findOrfail($category_id);

        return view('frontend.products',compact('products','category'));

    }

    public function productDetails($id){

        $product=Product::findOrfail($id);

        return view('frontend.product_details',compact('product'));


    }
}
