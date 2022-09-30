# Lang Generator

This package used to search for all lang keys from views and put them to lang files

### Installation
```shell
composer require ahmed-aliraqi/lang-generator --dev
```
> The package will automatically register a service provider.
### Configure
Next, you should publish the config file:
```shell
php artisan vendor:publish --provider="AhmedAliraqi\LangGenerator\ServiceProvider" --tag="config"

```
- `lang` key contains the lang files and their paths.

### Usage
```shell
php artisan lang:generate
```
