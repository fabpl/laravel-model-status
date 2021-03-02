# Laravel Model Status

Assign statuses to your Eloquent Model.

![styleci.io](https://github.styleci.io/repos/337483474/shield)

## Installation

Install package via composer:

```bash
composer require fabpl/laravel-model-status
```

Run install artisan command:

```bash
php artisan model-status:install
```

Optionally you can publish `config` files with:

```bash
php artisan model-status:publish
```

Migrate the `statuses` table:

```bash
php artisan migrate
```

## Usage

Add the `HasStatuses` trait to a model and defines available status.

```php
use Fabpl\ModelStatus\HasStatuses;

class Post extends Model
{
    use HasStatuses;
    
    /**
     * Get available status list.
     *
     * @return array
     */
    public function getAvailableStatus(): array
    {
        return ['draft', 'published', 'archived'];
    }
}
```

### Set a new status

You can set a new status like this:

```php
$postModel->setStatus('published');
```

### Retrieving statuses

You can get the current status name of model:

```php
$postModel->status;
```

You can list assigned status:

```php
$postModel->statuses;
```

You can deal with this relation like this:

```php
$postModel->statuses()->whereName('published')->get();
```
### Changelog

Please see [CHANGELOG](CHANGELOG.md).

### Security

If you discover any security related issues, please email planchettefabrice _at_ hotmail.com instead of using the issue tracker.

## Credits

- [Fabrice Planchette](https://fabpl.github.io)
