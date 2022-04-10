@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $setting->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_us">{{ trans('cruds.setting.fields.about_us') }}</label>
                <textarea class="form-control {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us" required>{{ old('about_us', $setting->about_us) }}</textarea>
                @if($errors->has('about_us'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_us_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.setting.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $setting->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product">{{ trans('cruds.setting.fields.product') }}</label>
                <input class="form-control {{ $errors->has('product') ? 'is-invalid' : '' }}" type="number" name="product" id="product" value="{{ old('product', $setting->product) }}" step="1">
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="snapchat">{{ trans('cruds.setting.fields.snapchat') }}</label>
                <input class="form-control {{ $errors->has('snapchat') ? 'is-invalid' : '' }}" type="text" name="snapchat" id="snapchat" value="{{ old('snapchat', $setting->snapchat) }}">
                @if($errors->has('snapchat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('snapchat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.snapchat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supportive_partner">{{ trans('cruds.setting.fields.supportive_partner') }}</label>
                <input class="form-control {{ $errors->has('supportive_partner') ? 'is-invalid' : '' }}" type="number" name="supportive_partner" id="supportive_partner" value="{{ old('supportive_partner', $setting->supportive_partner) }}" step="1" required>
                @if($errors->has('supportive_partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supportive_partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.supportive_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service">{{ trans('cruds.setting.fields.service') }}</label>
                <input class="form-control {{ $errors->has('service') ? 'is-invalid' : '' }}" type="number" name="service" id="service" value="{{ old('service', $setting->service) }}" step="1" required>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="experience_year">{{ trans('cruds.setting.fields.experience_year') }}</label>
                <input class="form-control {{ $errors->has('experience_year') ? 'is-invalid' : '' }}" type="number" name="experience_year" id="experience_year" value="{{ old('experience_year', $setting->experience_year) }}" step="1" required>
                @if($errors->has('experience_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.experience_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_text">{{ trans('cruds.setting.fields.contact_text') }}</label>
                <textarea class="form-control {{ $errors->has('contact_text') ? 'is-invalid' : '' }}" name="contact_text" id="contact_text" required>{{ old('contact_text', $setting->contact_text) }}</textarea>
                @if($errors->has('contact_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.contact_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_text">{{ trans('cruds.setting.fields.service_text') }}</label>
                <textarea class="form-control {{ $errors->has('service_text') ? 'is-invalid' : '' }}" name="service_text" id="service_text" required>{{ old('service_text', $setting->service_text) }}</textarea>
                @if($errors->has('service_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.service_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $setting->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $setting->youtube) }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp">{{ trans('cruds.setting.fields.whatsapp') }}</label>
                <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}">
                @if($errors->has('whatsapp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.whatsapp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="website">{{ trans('cruds.setting.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $setting->website) }}" required>
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_way">{{ trans('cruds.setting.fields.order_way') }}</label>
                <div class="needsclick dropzone {{ $errors->has('order_way') ? 'is-invalid' : '' }}" id="order_way-dropzone">
                </div>
                @if($errors->has('order_way'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_way') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.order_way_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="footer_image">{{ trans('cruds.setting.fields.footer_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('footer_image') ? 'is-invalid' : '' }}" id="footer_image-dropzone">
                </div>
                @if($errors->has('footer_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.footer_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_image">{{ trans('cruds.setting.fields.about_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_image') ? 'is-invalid' : '' }}" id="about_image-dropzone">
                </div>
                @if($errors->has('about_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_2_imag">{{ trans('cruds.setting.fields.about_2_imag') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_2_imag') ? 'is-invalid' : '' }}" id="about_2_imag-dropzone">
                </div>
                @if($errors->has('about_2_imag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_2_imag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_2_imag_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.orderWayDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1516,
      height: 732
    },
    success: function (file, response) {
      $('form').find('input[name="order_way"]').remove()
      $('form').append('<input type="hidden" name="order_way" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="order_way"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->order_way)
      var file = {!! json_encode($setting->order_way) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="order_way" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.footerImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 463,
      height: 433
    },
    success: function (file, response) {
      $('form').find('input[name="footer_image"]').remove()
      $('form').append('<input type="hidden" name="footer_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="footer_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->footer_image)
      var file = {!! json_encode($setting->footer_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="footer_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.aboutImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 505,
      height: 598
    },
    success: function (file, response) {
      $('form').find('input[name="about_image"]').remove()
      $('form').append('<input type="hidden" name="about_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->about_image)
      var file = {!! json_encode($setting->about_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.about2ImagDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 752,
      height: 537
    },
    success: function (file, response) {
      $('form').find('input[name="about_2_imag"]').remove()
      $('form').append('<input type="hidden" name="about_2_imag" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_2_imag"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->about_2_imag)
      var file = {!! json_encode($setting->about_2_imag) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_2_imag" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection