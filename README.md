# Get Details of Laravel Bank Reconciliation Package

<p align="center"><img src="https://picperf.io/https://laravelnews.s3.amazonaws.com/images/laravel-featured.png" width="200" alt="Laravel Logo"></a></p>

Install package (This command will work after setup https://packagist.org/)

```php
composer require whitelistpro/bank-reconciliation:dev-main
```

Package Setup Process:

1. Add package folder on Laravel project root directory

2. add
```php
composer require maatwebsite/excel:^3.1
```

3. run command
```php
php artisan vendor:publish
```

4. run command
```php
php artisan migrate
```

5. add path on project's composer.json file autoload/psr-4
```php
"WhitelistPRO\\BankReconciliation\\": "src/"
```

6. add path on project's composer.json file laravel/providers
```php
"WhitelistPRO\\BankReconciliation\\MasterServiceProvider"
```

7. add path into project's config/app.php file
```php
WhitelistPRO\BankReconciliation\MasterServiceProvider::class,
```

8. run command composer dump-autoload
