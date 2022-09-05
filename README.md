# php-course-2022-team4

# php-stock-exchange

## Installation

Copy the `.env` file

```
cp .env.example .env
```

change database infomation in .env

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

## Migration database
Run migration database in docker-compose exec terminal

```bash
php artisan migrate
```


## Usage

Stop docker

```
docker-compose stop
```
