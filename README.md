
# Model Activity Log

A simple Laravel package to automatically log Eloquent model create, update, and delete activities with user tracking.

## Features

- Logs model events: **created**, **updated**, **deleted**
- Stores old and new attribute values
- Tracks authenticated user ID performing the action
- Easy to enable on any Eloquent model with a single trait
- Lightweight and framework-friendly


## Installation

### 1. Require the package via Composer (Packagist):

```php
composer require ayoub-amzil/model-activity-log
```

### 2. Publish migration:

```php
php artisan vendor:publish --tag=model-activity-log-migrations

```

### 3. Run migration:

```php
php artisan migrate

```
### 4. Add the trait to any Eloquent model you want to track:

```php
use AyoubAmzil\ModelActivityLog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;

    // Your model code...
}

```

    
## Usage

### 1. Model activities will now be logged automatically on create, update, and delete.


```php
// create
$product = Product::create(['name' => 'Example', 'price' => 100]);

// update
$product->price = 120;
$product->save();

//delete
$product->delete();

```

### 2. Access logs:
```php
use AyoubAmzil\ModelActivityLog\Models\ActivityLog;

$logs = ActivityLog::all();

```



