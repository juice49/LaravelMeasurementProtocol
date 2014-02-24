<?php namespace Ash\LaravelMeasurementProtocol;

use Illuminate\Support\ServiceProvider;

class LaravelMeasurementProtocolServiceProvider extends ServiceProvider {

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
	public function boot() {
		
		if(!\Config::get('analytics.tid')) {
			throw new \Exception('Laravel Measurement Protocol requires config.analytics.tid to be set');
		}
		
		$this->package('ash/laravel-measurement-protocol');
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}