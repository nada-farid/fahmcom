@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productCart.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.id') }}
                        </th>
                        <td>
                            {{ $productCart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.product') }}
                        </th>
                        <td>
                            {{ $productCart->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.name') }}
                        </th>
                        <td>
                            {{ $productCart->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.email') }}
                        </th>
                        <td>
                            {{ $productCart->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.phone') }}
                        </th>
                        <td>
                            {{ $productCart->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.city') }}
                        </th>
                        <td>
                            {{ $productCart->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.address') }}
                        </th>
                        <td>
                            {{ $productCart->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productCart.fields.extra_info') }}
                        </th>
                        <td>
                            {{ $productCart->extra_info }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection