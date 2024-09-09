<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'logo_url',
        'company_name',
        'currency',
        'contact_email',
        'contact_phone',
        'language',
        'maintenance_mode',
        'backup_frequency',
        'backup_location',
        'support_url',
        'social_media_links',
        'terms_url',
        'privacy_policy_url',
        'timezone',
    ];

    public $orderable = [
        'id',
        'logo_url',
        'company_name',
        'currency',
        'contact_email',
        'contact_phone',
        'language',
        'maintenance_mode',
        'backup_frequency',
        'backup_location',
        'support_url',
        'social_media_links',
        'terms_url',
        'privacy_policy_url',
        'timezone',
    ];

    public $filterable = [
        'id',
        'logo_url',
        'company_name',
        'currency',
        'contact_email',
        'contact_phone',
        'language',
        'maintenance_mode',
        'backup_frequency',
        'backup_location',
        'support_url',
        'social_media_links',
        'terms_url',
        'privacy_policy_url',
        'timezone',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class);
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
