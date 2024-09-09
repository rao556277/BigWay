<?php

namespace App\Traits;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function (Model $model) {
            self::audit('audit:created', $model);
        });

        static::updated(function (Model $model) {
            self::audit('audit:updated', $model, $model->getChanges());
        });

        static::deleted(function (Model $model) {
            self::audit('audit:deleted', $model);
        });
    }

    protected static function audit($description, $model, $changes = [])
    {
        $properties = $changes ? collect($changes) : $model;

        AuditLog::create([
            'description'  => $description,
            'subject_id'   => $model->id ?? null,
            'subject_type' => sprintf('%s#%s', get_class($model), $model->id) ?? null,
            'user_id'      => auth()->id() ?? null,
            'properties'   => $properties->toJson(),
            'host'         => request()->ip() ?? null,
        ]);
    }
}
