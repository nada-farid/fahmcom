<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('order_way', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('order_way'))))->toMediaCollection('order_way');
        }

        if ($request->input('footer_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_image'))))->toMediaCollection('footer_image');
        }

        if ($request->input('about_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        if ($request->input('about_2_imag', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_2_imag'))))->toMediaCollection('about_2_imag');
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting = Setting::first();
        $setting->update($request->all());

        if ($request->input('order_way', false)) {
            if (!$setting->order_way || $request->input('order_way') !== $setting->order_way->file_name) {
                if ($setting->order_way) {
                    $setting->order_way->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('order_way'))))->toMediaCollection('order_way');
            }
        } elseif ($setting->order_way) {
            $setting->order_way->delete();
        }

        if ($request->input('footer_image', false)) {
            if (!$setting->footer_image || $request->input('footer_image') !== $setting->footer_image->file_name) {
                if ($setting->footer_image) {
                    $setting->footer_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_image'))))->toMediaCollection('footer_image');
            }
        } elseif ($setting->footer_image) {
            $setting->footer_image->delete();
        }

        if ($request->input('about_image', false)) {
            if (!$setting->about_image || $request->input('about_image') !== $setting->about_image->file_name) {
                if ($setting->about_image) {
                    $setting->about_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
            }
        } elseif ($setting->about_image) {
            $setting->about_image->delete();
        }

        if ($request->input('about_2_imag', false)) {
            if (!$setting->about_2_imag || $request->input('about_2_imag') !== $setting->about_2_imag->file_name) {
                if ($setting->about_2_imag) {
                    $setting->about_2_imag->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_2_imag'))))->toMediaCollection('about_2_imag');
            }
        } elseif ($setting->about_2_imag) {
            $setting->about_2_imag->delete();
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
