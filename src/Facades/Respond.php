<?php 

namespace Vahid\Respond\Facades;

use Illuminate\Support\Facades\Facade;

class Respond extends Facade {


	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
    { 
        return 'Vahid\Respond\Messages';
    }

}
