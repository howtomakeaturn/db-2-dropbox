Backup your database to dropbox easily.

# Installation

You can just download the file to your project, or install it via composer:
```
composer require "howtomakeaturn/db-2-dropbox"
```

# Usage

Get dropbox app key, secret, and access token from [Dropbox App Console](https://www.dropbox.com/developers/apps) (Choose 'App folder' for the type)

```php
$db2d = new Db2d();

$db2d->configureDatabase($db, $username, $password);

$db2d->configureDropbox($app_key, $app_secret, $access_token);

$db2d->backup();
```

And then you can see your database backup in the dropbox folder!
