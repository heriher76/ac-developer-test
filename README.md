# AC Developer Test

Built with Laravel 7 for Multi Tenancy and Localization.

## Installation
1. Clone the repository with 
```bash
git clone https://github.com/heriher76/ac-developer-test
```
2. Copy .env.example file to .env and edit database credentials there. Don't forget to update the CENTRAL_DOMAIN with your local url.

3. Use the package manager "composer" to install library.

```bash
composer install
```
4. Run 

```bash
php artisan key:generate
```

5. Run (Create table on database)

```bash
php artisan migrate
```

6. I suggest for running this app you can see (Laravel Valet) https://github.com/cretueusebiu/valet-windows

That's it, launch the main url with valet on your browser like "ac-developer.test"
