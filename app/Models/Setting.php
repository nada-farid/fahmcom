<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'order_way',
        'footer_image',
        'about_image',
        'about_2_imag',
    ];

    protected $fillable = [
        'email',
        'phone',
        'about_us',
        'description',
        'product',
        'snapchat',
        'supportive_partner',
        'service',
        'experience_year',
        'contact_text',
        'service_text',
        'twitter',
        'instagram',
        'youtube',
        'whatsapp',
        'facebook',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('about')->fit('crop', 413.383, 493.067);
        $this->addMediaConversion('about2')->fit('crop',752,537);
    }

    public function getOrderWayAttribute()
    {
        $file = $this->getMedia('order_way')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getFooterImageAttribute()
    {
        $file = $this->getMedia('footer_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getAboutImageAttribute()
    {
        $file = $this->getMedia('about_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->about   = $file->getUrl('about');
            $file->about2   = $file->getUrl('about2');
        }

        return $file;
    }
    public function getAbout2ImagAttribute()
    {
        $file = $this->getMedia('about_2_imag')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
