<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCartRequest;
use App\Http\Requests\StoreProductCartRequest;
use App\Http\Requests\UpdateProductCartRequest;
use App\Models\Product;
use App\Models\ProductCart;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCartsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCarts = ProductCart::with(['product', 'user'])->get();

        return view('admin.productCarts.index', compact('productCarts'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productCarts.create', compact('products', 'users'));
    }

    public function store(StoreProductCartRequest $request)
    {
        $productCart = ProductCart::create($request->all());

        return redirect()->route('admin.product-carts.index');
    }

    public function edit(ProductCart $productCart)
    {
        abort_if(Gate::denies('product_cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productCart->load('product', 'user');

        return view('admin.productCarts.edit', compact('productCart', 'products', 'users'));
    }

    public function update(UpdateProductCartRequest $request, ProductCart $productCart)
    {
        $productCart->update($request->all());

        return redirect()->route('admin.product-carts.index');
    }

    public function show(ProductCart $productCart)
    {
        abort_if(Gate::denies('product_cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCart->load('product', 'user');

        return view('admin.productCarts.show', compact('productCart'));
    }

    public function destroy(ProductCart $productCart)
    {
        abort_if(Gate::denies('product_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCart->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCartRequest $request)
    {
        ProductCart::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
