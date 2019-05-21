[![Build Status](https://travis-ci.org/vahid-almasi/respond.svg?branch=master)](https://travis-ci.org/vahid-almasi/respond)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vahid-almasi/respond/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vahid-almasi/respond/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/vahid/respond/v/stable)](https://packagist.org/packages/vahid/respond)
[![Total Downloads](https://poser.pugx.org/vahid/respond/downloads)](https://packagist.org/packages/vahid/respond)
[![License](https://poser.pugx.org/vahid/respond/license)](https://packagist.org/packages/vahid/respond)
# Laravel Respond

This package is provided to be used on lumen and laravel framework v5 and upper and it gives clean methods to handle json response with specific predetermined messages.

# Requirement
* Laravel ^5.1
* Lumen
* PHP ^5.5

## Install

##Via Composer

Go to your project path and run this code in your terminal

```bash
$ composer require vahid/respond
```

Or edit your composer.json to require the package.
```json
"require": {
    "vahid/respond": "^1.0"
}
```
Then run `composer update` in your terminal to pull it in
##Config

### Laravel

you will need to add the service provider to the providers array in your `config/app.php` as follows:
``` php
Vahid\Respond\RespondServiceProvider::class,
```

Next, also in the app.php config file, under the aliases array, you may want to add the Respond facade.
``` php
'Respond' => Vahid\Respond\Facades\Respond::class,
```

Laravel 4:
```bash
$ php artisan config:publish vahid/respond
```

Laravel 5:
```bash
$ php artisan vendor:publish --provider="Vahid\Respond\Providers\RespondServiceProvider"
```

### Lumen

#### Added into providers

you will need to add the service provider beside another register service providers on `bootstrap/app.php` as follows:
```php
$app->register(Vahid\Respond\RespondServiceProvider::class);
```
 after that you need create a helper and add `config_path` function.
 
 #### Create `config_path` helper for Lumen 
 
 Create a file called GeneralHelpers.php in the app/Helpers directory. Paste the code inside it.
 ```php
<?php
if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
``` 
Go to composer.json and add files to autoload so that it looks like this:
```json
"autoload": {
    "psr-4": {
        "App\\": "app/"
    },
    "files": [
        "app/Helpers/GeneralHelpers.php"
    ]
},
```
Run composer dump-autoload to load the newly created helpers file.
    
## Usage

You can use these methods in deffernt ways:

There are hot ones for quick usage, besides some provided to manage outputs on your own way

**Some are shown below:**


When request succeeds and contains data to return as a result:
``` php
Respond::succeed( $data );
```

When deletion action succeeds:
``` php
Respond::deleteSucceeded();
```

When updating succeeds:
``` php
Respond::updateSucceeded();
```

When insertion succeeds:
``` php
Respond::insertSucceeded();
```

When deletion action fails:
``` php
Respond::deleteFailed();
```

When updating fails:
``` php
Respond::updateFailed();
```

when insertion fails:
``` php
Respond::insertFailed();
```

Not Found Error:
``` php
Respond::notFound();
```

When db connetion is refused:
``` php
Respond::connectionRefused();
```

When parameters entered are wrong:
``` php
Respond::wrongParameters();
```

When requested method is not allowed:
``` php
Respond::methodNotAllowed();
```

``` php
Respond::requestFailedNotFound();
```

Validation errors:
``` php
Respond::validationErrors( $data );
```

**Note:** If you use Laravel FormRequest, to prevent iteration, we recommend try this method in App\Http\Request.php and override response method of Illuminate FormRequest

###customization

Set custom message for methods is like this:
``` php
Respond::notFound( 'Leave it empty or enter your custom message here' );
```

And you can do more:
``` php
Respond::setStatusCode( 200 )->setStatusText( 'succeed' )->respondWithMessage( 'Your custom message' );
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
