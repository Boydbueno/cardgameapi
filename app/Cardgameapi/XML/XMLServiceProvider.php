<?php namespace Cardgameapi\XML;

use Illuminate\Support\ServiceProvider;

class XMLServiceProvider extends ServiceProvider {
	
	/** 
	 * Register the service provided
	 * 
	 * @return void
	 */
	public function register() 
	{
		$this->app->bind('XML', function()
		{
			return new XMLBuilder;
		});
	}

}