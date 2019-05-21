<?php

namespace Vahid\Respond\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Respond
 * @package Vahid\Respond\Facades
 *
 * @method static succeed($data)
 * @method static deleteSucceeded($message = null)
 * @method static updateSucceeded($message = null)
 * @method static insertSucceeded($message = null)
 * @method static deleteFailed($message = null)
 * @method static updateFailed($message = null)
 * @method static insertFailed($message = null)
 * @method static connectionRefused()
 * @method static notFound()
 * @method static wrongParameters()
 * @method static methodNotAllowed()
 * @method static validationErrors($message = null)
 * @method static requestFailedNotFound()
 * @method static requestFailedDuplicated()
 * @method static error($code)
 */
class Respond extends Facade
{


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
