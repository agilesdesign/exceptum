<?php

namespace Exceptum\Providers;

use Exceptum\Support\Repository;
use Exceptum\Foundation\Exceptions\Handler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler as LaravelExceptionHandler;
use Exceptum\Contracts\Repository as RepositoryContract;

class ExceptumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		App::bind(LaravelExceptionHandler::class, Handler::class);

		App::singleton(RepositoryContract::class, Repository::class);
	}
}
