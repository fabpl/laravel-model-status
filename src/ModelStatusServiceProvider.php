<?php

namespace Fabpl\ModelStatus;

use Fabpl\ModelStatus\Console\InstallCommand;
use Fabpl\ModelStatus\Console\PublishCommand;
use Illuminate\Support\ServiceProvider;

class ModelStatusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureCommands();
        $this->configurePublishing();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerConfig();
    }

    /**
     * Configure the commands offered by the application.
     *
     * @return void
     */
    protected function configureCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                PublishCommand::class,
            ]);
        }
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // Configuration...
            $this->publishes([
                __DIR__.'/../config/model-status.php' => config_path('model-status.php'),
            ], 'model-status-config');

            // Migrations...
            $this->publishes([
                __DIR__.'/../database/migrations/2021_01_01_000000_create_statuses_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_statuses_table.php'),
            ], 'model-status-migrations');
        }
    }

    /**
     * Register configuration files.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/model-status.php', 'model-status');
    }
}
