<?php

declare(strict_types=1);

namespace Bosnadev\Database;

use Bosnadev\Database\Connectors\ConnectionFactory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\DatabaseServiceProvider as IlluminateServiceProvider;

class DatabaseServiceProvider extends IlluminateServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            'db.factory',
            fn ($app) => new ConnectionFactory($app)
        );

        $this->app->singleton(
            'db',
            fn ($app) => new DatabaseManager($app, $app['db.factory'])
        );
    }
}
