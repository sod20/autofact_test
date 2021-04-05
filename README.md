# About Autofact Test

This is a Development Skills Test for Autofact.cl, as an assessment for Laravel Skills.

## Compilation

Having composer installed, you can simple run the following command to install vendor repository.
```
composer install
```

### Setup Database

After that, you need to configure a database and `.env` file with the following suggested data so Laravel can setup database tables with a migration.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=autofact
DB_USERNAME=autofact
DB_PASSWORD=autofactPassword1
```
### Run Migration

To run the program and have default data for admin's chart, you must run migrations so that will not only creates tables also will execute a seeder that insert data in our tables.

```
php artisan migrate
```

### Run Application

It is a Laravel Application so run `artisan serve` to start application in local repository.
```
php artisan serve
```

You can register on the main page by clicking register button but also can use default admin login data:
```
email: mrtest1@gmail.com
password: password11
```

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
