# Laravel Multi Locales Package

> The package used to support multi locales in your application.
## Installation
 
1. Install package
 
    ```bash
    composer require laraeast/laravel-locales
    ```

2. Edit config/app.php (Skip this step if you are using laravel 5.5+)
 
    service provider:
 
    ```php
    Laraeast\LaravelLocales\Providers\LocalesServiceProvider::class,
    ```
 
    class aliases:
 
    ```php
    'Locales' => Laraeast\LaravelLocales\Facades\Locales::class,
    ```
 
 3. Configure your custom locales:
  
    ```bash
    php artisan vendor:publish --tag="locales:config"
    ```
     
 4. Copy locales flags to public:
  
    ```bash
    php artisan vendor:publish --tag="locales:flags"
    ```
    
## Usage

#### Locales selector dropdown:
```blade
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ Locales::getFlag() }}">
        {{ Locales::getName() }}
    </a>
    <ul class="dropdown-menu">
        @foreach(Locales::get() as $locale)
            <li>
                <a href="{{ url('locale/'. $locale->code) }}">
                    {{ $locale->name }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
```
#### API
```php
Locales::get();
// array of supported locales

Locales::set('en');

Locales::current();
// the current locale instance

Locales::current()->code;
// or 
Locales::getCode();
// return : en

Locales::current()->name;
// or 
Locales::getName();
// return : English

Locales::current()->dir;
// or
Locales::getDir();
// return : ltr

Locales::current()->flag;
// or
Locales::getFlag();
// return : /images/flags/us.png
```