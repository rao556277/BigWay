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

class Caretaker extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'caretakers';

    protected $appends = [
        'profile_picture',
    ];

    public const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $dates = [
        'employment_date',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BLOOD_GROUP_SELECT = [
        'A+'  => 'A+',
        'B+'  => 'B+',
        'O+'  => 'O+',
        'AB+' => 'AB+',
        'A-'  => 'A-',
        'B-'  => 'B-',
        'O-'  => 'O-',
        'AB-' => 'AB-',
    ];

    protected $fillable = [
        'name',
        'address',
        'cnic',
        'image_url',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'employment_date',
        'date_of_birth',
        'blood_group',
        'vehicle_type_id',
        'emergency_contact_id',
        'gender',
    ];

    public $orderable = [
        'id',
        'name',
        'address',
        'cnic',
        'image_url',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'employment_date',
        'date_of_birth',
        'blood_group',
        'vehicle_type.name',
        'emergency_contact.name',
        'gender',
    ];

    public $filterable = [
        'id',
        'name',
        'address',
        'cnic',
        'image_url',
        'medical_condition',
        'emergency_medication',
        'allergies',
        'employment_date',
        'date_of_birth',
        'blood_group',
        'vehicle_type.name',
        'emergency_contact.name',
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

    public function getEmploymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setEmploymentDateAttribute($value)
    {
        $this->attributes['employment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBloodGroupLabelAttribute($value)
    {
        return static::BLOOD_GROUP_SELECT[$this->blood_group] ?? null;
    }

    public function vehicleType()
    {
        return $this->belongsTo(Vehicletype::class);
    }

    public function emergencyContact()
    {
        return $this->belongsTo(Emergencycontact::class);
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
        return $this->getMedia('caretaker_profile_picture')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
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
