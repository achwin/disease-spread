<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Penyebaran Penyakit

## Requirements
* [XAMPP](https://www.apachefriends.org/download.html) (Versi PHP minimal 7.1) 
* [Composer](https://getcomposer.org/)
* [Git](https://git-scm.com/downloads)


## Installation
1. Clone [this repo](https://github.com/achwin/disease-spread.git)
2. Setelah itu run command berikut di cmd direktori repo tadi
```bash
composer install
```

3. Buat file baru bernama .env

4. Copy paste isi dari .env.example ke .env tadi, kemudian atur konfigurasi username dan password database di .env

```php
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
```

5. Setelah itu jalankan command ini di cmd
```bash
php artisan key:generate
```
## Usage
1. Jalankan aplikasi ini dengan command
```bash
php artisan serve
```

2. Untuk menjalankan aplikasi di browser gunakan url
```bash
localhost:8000
```

[Coding for Purpose]
