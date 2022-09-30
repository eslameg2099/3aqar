<?php

namespace Laraeast\LaravelLocales\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Locales
 *
 * @method static array get()
 * @method static object current()
 * @method static void set($locale)
 * @method static string getCode()
 * @method static string getName()
 * @method static string getDir()
 * @method static string getFlag()
 * @package Laraeast\LaravelLocales\Facades
 */
class Locales extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraeast.locales';
    }
}