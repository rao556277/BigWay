<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'logs';

    protected $dates = [
        'timezone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'entity_type',
        'entity',
        'action',
        'timezone',
        'performed_by_id',
        'created_by_id',
    ];

    public $orderable = [
        'id',
        'entity_type',
        'entity',
        'action',
        'timezone',
        'performed_by.name',
        'created_by.name',
    ];

    public $filterable = [
        'id',
        'entity_type',
        'entity',
        'action',
        'timezone',
        'user.name',
        'performed_by.name',
        'created_by.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTimezoneAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setTimezoneAttribute($value)
    {
        $this->attributes['timezone'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function performedBy()
    {
        return $this->belongsTo(User::class);
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
