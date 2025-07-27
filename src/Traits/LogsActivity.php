<?php

namespace AyoubAmzil\ModelActivityLog\Traits;

use Illuminate\Support\Facades\Auth;
use AyoubAmzil\ModelActivityLog\Models\ActivityLog;

trait LogsActivity
{
    public static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->logActivity('created');
        });

        static::updated(function ($model) {
            $model->logActivity('updated');
        });

        static::deleted(function ($model) {
            $model->logActivity('deleted');
        });
    }

    protected function logActivity(string $operation)
    {
        $userId = Auth::id();

        $oldValues = $operation === 'updated' ? $this->getOriginal() : null;
        $newValues = $operation === 'deleted' ? null : $this->getAttributes();

        ActivityLog::create([
            'model'      => get_class($this),
            'model_id'   => $this->getKey(),
            'operation'  => $operation,
            'user_id'    => $userId,
            'old_values' => $oldValues ? json_encode($oldValues) : null,
            'new_values' => $newValues ? json_encode($newValues) : null,
        ]);
    }
}
