@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.serviceRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.service-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.serviceRequest.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceRequest.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.serviceRequest.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceRequest.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.serviceRequest.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceRequest.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.serviceRequest.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceRequest.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="extra_info">{{ trans('cruds.serviceRequest.fields.extra_info') }}</label>
                <textarea class="form-control {{ $errors->has('extra_info') ? 'is-invalid' : '' }}" name="extra_info" id="extra_info" required>{{ old('extra_info') }}</textarea>
                @if($errors->has('extra_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extra_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceRequest.fields.extra_info_helper') }}</span>
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