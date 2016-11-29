# exceptum
Custom Exception Handling for Laravel

### Installation

##### Include through composer

`composer require agilesdesign/exceptum`

##### Add to provider list

```php
'providers' => [
    Exceptum\Providers\ExceptumServiceProvider::class,
];
```

### Usage
##### Create an Abettor
`Abettor` is synonymous with `App\Exceptions\Handler` in it's intent, but is not an extension of it.

Currently it only supports implementing the response provided to the `render` method on `App\Exception\Handler` 
```?php
class AuthorizatonExceptionAbettor implements Abettor
{
    public function render($request, Exception $exception)
    {
        // handle exception
    }
}
```
##### Register Mapping
Exceptum falls back to Laravel's App\Exception\Handler class unless it knows about an Abettor responsible for Exception thrown.

To tell Exceptum about an Abettor register a mapping in your `ServiceProviders` `register` method
```php
public function register()
{
    Exceptum::map(AuthorizationException::class, AuthorizationExceptionAbettor::class);
}
```
