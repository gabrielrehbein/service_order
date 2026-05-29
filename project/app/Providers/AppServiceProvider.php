<?php

namespace App\Providers;

use App\Contracts\Address\IAddressRepository;
use App\Contracts\Customer\ICustomerRepository;
use App\Contracts\Product\IProductRepository;
use App\Repositories\Address\AddressEloquentRepository;
use App\Repositories\Customer\CustomerEloquentRepository;
use App\Repositories\Products\ProductEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IProductRepository::class,
            ProductEloquentRepository::class
        );

        $this->app->bind(
            ICustomerRepository::class,
            CustomerEloquentRepository::class
        );

        $this->app->bind(
            IAddressRepository::class,
            AddressEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
