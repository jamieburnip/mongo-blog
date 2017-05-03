<?php

namespace Blog\Framework\Providers;

use Blog\Framework\Bus\ChiefAdapter;
use Chief\Bridge\Laravel\IlluminateContainer;
use Chief\Busses\SynchronousCommandBus;
use Chief\Chief;
use Chief\CommandBus;
use Chief\Resolvers\NativeCommandHandlerResolver;
use Illuminate\Support\ServiceProvider;

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
    }
}
