# php-course-2022 team4 Stock-exchange

## Installation

Copy the `.env` file

```
cp .env.example .env
cp ./app/.env.example ./app/.env
```

Change file `./app/.env` database infomation from docker-compose.yml. eg:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=stock_exchange
DB_USERNAME=php_course
DB_PASSWORD=dev@123
```


Build docker image

```
docker-compose build
```

Run docker image

```
docker-compose up
```

Run the following command to install the package through Composer:

```bash
docker-compose exec app bash
```

## Migration database in docker app enviroment
Run migration database in docker-compose exec terminal

```bash
composer install
php artisan migrate
```

## If directory permission deny
Run in actual folder
```bash
chmod -R 777 ./app
```

## Usage

Stop docker

```
docker-compose stop
```
