<?php

namespace Modules\Wine\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Wine\Events\Handlers\RegisterWineSidebar;
use Modules\Media\Image\ThumbnailManager;

class WineServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterWineSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('wines', array_dot(trans('wine::wines')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('wine', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->app[ThumbnailManager::class]->registerThumbnail('miniProfileThumb', [
            'resize' => [
                'width' => 100,
                'height' => null,
                'callback' => function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                },
            ],
        ]);
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
            'Modules\Wine\Repositories\WineRepository',
            function () {
                $repository = new \Modules\Wine\Repositories\Eloquent\EloquentWineRepository(new \Modules\Wine\Entities\Wine());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Wine\Repositories\Cache\CacheWineDecorator($repository);
            }
        );
// add bindings

    }
}
