<?php

namespace Blog\Framework\Providers;

use Blog\Framework\Bus\ChiefAdapter;
use Chief\Bridge\Laravel\IlluminateContainer;
use Chief\Busses\SynchronousCommandBus;
use Chief\Chief;
use Chief\CommandBus;
use Chief\Resolvers\NativeCommandHandlerResolver;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package Blog\Framework\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommandBus::class, function (\Illuminate\Container\Container $container) {
            $chief = new Chief(new SynchronousCommandBus(
                new NativeCommandHandlerResolver(
                    new IlluminateContainer(
                        $container
                    )
                )
            ));

            return new ChiefAdapter($chief);
        });

        /**
         * Register all post services
         */
        $this->registerPostServices();
    }

    /**
     *
     */
    private function registerPostServices()
    {
        $this->app->singleton(
            \Blog\Domain\Posts\Repository::class,
            \Blog\Domain\Posts\MongoDbRepository::class
        );

    }
}
