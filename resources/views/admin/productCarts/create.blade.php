@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productCart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-carts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productCart.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productCart.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.productCart.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.productCart.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.productCart.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.productCart.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="extra_info">{{ trans('cruds.productCart.fields.extra_info') }}</label>
                <textarea class="form-control {{ $errors->has('extra_info') ? 'is-invalid' : '' }}" name="extra_info" id="extra_info" required>{{ old('extra_info') }}</textarea>
                @if($errors->has('extra_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extra_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productCart.fields.extra_info_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection