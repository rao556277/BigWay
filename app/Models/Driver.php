<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Driver extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'drivers';

    public static $search = [
        'name',
    ];

    protected $appends = [
        'profile_picture',
    ];

    public const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $dates = [
        'dob',
        'license_expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BLOOD_GROUP_SELECT = [
        'A+'  => 'A+',
        'A-'  => 'A-',
        'B+'  => 'B+',
        'B-'  => 'B-',
        'O+'  => 'O+',
        'O-'  => 'O-',
        'AB+' => 'AB+',
        'AB-' => 'AB-',
    ];

    protected $fillable = [
        'name',
        'license_number',
        'address',
        'cnic',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'hire_date',
        'image_url',
        'blood_group',
        'dob',
        'license_expiry_date',
        'gender',
    ];

    public $orderable = [
        'id',
        'name',
        'license_number',
        'address',
        'cnic',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'hire_date',
        'image_url',
        'blood_group',
        'dob',
        'license_expiry_date',
        'gender',
    ];

    public $filterable = [
        'id',
        'name',
        'license_number',
        'address',
        'cnic',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'hire_date',
        'image_url',
        'blood_group',
        'dob',
        'license_expiry_date',
        'gender',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getBloodGroupLabelAttribute($value)
    {
        return static::BLOOD_GROUP_SELECT[$this->blood_group] ?? null;
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class);
    }

    public function getProfilePictureAttribute()
    {
        return $this->getMedia('driver_profile_picture')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLicenseExpiryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setLicenseExpiryDateAttribute($value)
    {
        $this->attributes['license_expiry_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getGenderLabelAttribute($value)
    {
        return static::GENDER_RADIO[$this->gender] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
