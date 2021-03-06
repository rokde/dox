<?php namespace Rokde\Dox;

use Config;
use Route;
use Illuminate\Support\ServiceProvider;

class DoxServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('rokde/dox');
		$this->registerRoute();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//	does nothing right now, because registering routes
		//	faulted in Class translation not found
	}

	/**
	 * registering a route
	 */
	public function registerRoute()
	{
		$uri = rtrim(Config::get('dox::uri'), '/') . '/';
		Route::get($uri . '{file?}', 'Rokde\Dox\DocumentationController@getDocument')
			->where('file', '[a-z0-9\-\_\.\/]+');
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
}
