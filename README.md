# php-course-2022 team4 Stock-exchange

## Installation

Copy the `.env` file

```
cp .env.example .env
cp ./app/.env.example ./app/.env
```

Change below part in file `./app/.env` to database infomation from docker-compose.yml:
```
DB_CONNECTION=mysql
DB_HOST={DB_HOST_IN_DOCKER_COMPOSE}
DB_PORT=3306
DB_DATABASE={DB_DATABASE_IN_DOCKER_COMPOSE}
DB_USERNAME={DB_USERNAME_IN_DOCKER_COMPOSE}
DB_PASSWORD={DB_PASSWORD_IN_DOCKER_COMPOSE}
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
docker-compose exec composer install
```


## Migration database in docker app enviroment
Enter docker app terminal:
```bash
docker-compose exec app bash
```

Run migration database and seeding data in docker-compose exec terminal

```bash
composer install

# Run migration
php artisan migrate

# Refresh the database and run all database seeds...
php artisan migrate:refresh --seed
```

## If directory permission deny
Run in actual folder to grand permission for docker to use that forder
```bash
chmod -R 777 ./app
```

## Usage

Stop docker

```
docker-compose stop
```

Full reset docker environment

```
docker-compose down -v
```

### Include JWT in the app

```
composer update
php artisan jwt:secret
```
