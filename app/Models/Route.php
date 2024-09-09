<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'routes';

    public static $search = [
        'route_name',
    ];

    protected $dates = [
        'start_location_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'route_name',
        'start_location_type',
        'start_location',
        'end_location_type',
        'end_location',
        'total_distance',
        'estimated_time',
    ];

    public $orderable = [
        'id',
        'route_name',
        'start_location_type',
        'start_location',
        'end_location_type',
        'end_location',
        'total_distance',
        'estimated_time',
    ];

    public $filterable = [
        'id',
        'route_name',
        'start_location_type',
        'start_location',
        'end_location_type',
        'end_location',
        'total_distance',
        'estimated_time',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartLocationTypeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setStartLocationTypeAttribute($value)
    {
        $this->attributes['start_location_type'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
