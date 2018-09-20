<?php

namespace Modules\Test\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Test\Events\Handlers\RegisterTestSidebar;

class TestServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterTestSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('tests', array_dot(trans('test::tests')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('test', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Test\Repositories\TestRepository',
            function () {
                $repository = new \Modules\Test\Repositories\Eloquent\EloquentTestRepository(new \Modules\Test\Entities\Test());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Test\Repositories\Cache\CacheTestDecorator($repository);
            }
        );
// add bindings

    }
}
