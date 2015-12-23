<?php
namespace lyt8384\Pingpp;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Pingpp\Pingpp;
use lyt8384\Pingpp\PingppCollertion;

class PingppServiceProvider extends ServiceProvider {
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
		$config = config('pingpp');

        $this->app->bind('pingpp',function() use ($config) {
			$client = new Pingpp();
			$client->setApiKey(
					$config['live'] === true
							? $config['live_secret_key']
							: $config['test_secret_key']
			);

			return new PingppCollertion();
        });
	}

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/pingpp.php' => config_path('pingpp.php')
        ]);

        AliasLoader::getInstance()->alias('Pingpp','lyt8384\Pingpp\Facades\Pingpp');
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
