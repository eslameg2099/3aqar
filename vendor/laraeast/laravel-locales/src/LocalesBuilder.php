<?php

namespace Laraeast\LaravelLocales;

use Illuminate\Foundation\Application;
use Laraeast\LaravelLocales\Exceptions\NotSupportedLocaleException;

class LocalesBuilder
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Application locales.
     *
     * @var array
     */
    protected $locales = [];

    /**
     * Create application instance.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->locales = $this->setLocales();
    }

    /**
     * Get the supported locales.
     *
     * @return array
     */
    public function get()
    {
        return $this->locales;
    }

    /**
     * Get the application locale.
     *
     * @return object|null
     */
    public function current()
    {
        return $this->locales[$this->app->getLocale()] ?? null;
    }

    /**
     * Set the supported locales.
     *
     * @return array
     */
    private function setLocales()
    {
        $supportedLocales = $this->app['config']->get('locales.languages');

        $locales = [];
        if (is_array($supportedLocales)) {
            foreach ($supportedLocales as $code => $locale) {
                $locales[$code] = (object)$locale;
            }
        }

        return $locales;
    }

    /**
     * Set the supported locales.
     *
     * @param string $locale
     * @return void
     * @throws \Laraeast\LaravelLocales\Exceptions\NotSupportedLocaleException
     */
    public function set($locale)
    {
        if (! array_key_exists($locale, $this->locales)) {
            throw new NotSupportedLocaleException;
        }

        $this->app->setLocale($locale);
    }

    /**
     * The code of current locale.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->current()->code;
    }

    /**
     * The name of current locale.
     *
     * @return string
     */
    public function getName()
    {
        return $this->current()->name;
    }

    /**
     * The direction of current locale.
     *
     * @return string
     */
    public function getDir()
    {
        return $this->current()->dir;
    }

    /**
     * The flag url of current locale.
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->current()->flag;
    }
}