<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Junction extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'junctions';

    protected $dates = [
        'arrival_time',
        'departure_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'junction_name',
        'arrival_time',
        'departure_time',
        'distance_from_last_location',
        'location_id',
    ];

    public $orderable = [
        'id',
        'junction_name',
        'arrival_time',
        'departure_time',
        'distance_from_last_location',
        'location.user',
    ];

    public $filterable = [
        'id',
        'junction_name',
        'arrival_time',
        'departure_time',
        'distance_from_last_location',
        'location.user',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getArrivalTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setArrivalTimeAttribute($value)
    {
        $this->attributes['arrival_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDepartureTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDepartureTimeAttribute($value)
    {
        $this->attributes['departure_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
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
