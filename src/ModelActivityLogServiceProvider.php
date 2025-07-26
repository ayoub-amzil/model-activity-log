<?php

namespace AyoubAmzil\ModelActivityLog;

use Illuminate\Support\ServiceProvider;

class ModelActivityLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migration
        $this->publishes([
            __DIR__ . '/../database/migrations/2025_07_26_000000_create_activity_logs_table.php' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_activity_logs_table.php'),
        ], 'model-activity-log-migrations');

    }

    public function register()
    {
        //
    }
}
