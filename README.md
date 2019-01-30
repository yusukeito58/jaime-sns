# Docker for Laravel development

## Make develop directory

```
$ mkdir laravel-app
$ cd laravel-app/
```

## Get docker files

```
$ wget -O docker.zip https://github.com/yusukeito58/docker-for-laravel-development/archive/master.zip  \
    && unzip docker.zip && mv docker-for-laravel-development-master/* ./ \
    && rm -rf docker.zip docker-for-laravel-development-master

$ ls 
docker                  docker-compose.yml
```

## Docker run

```
$ docker-compose up -d --build

$ docker-compose ps
      Name                     Command              State                 Ports
---------------------------------------------------------------------------------------------
laravel-app_app_1   docker-php-entrypoint php-fpm   Up      9000/tcp
laravel-app_db_1    docker-entrypoint.sh mysqld     Up      0.0.0.0:3306->3306/tcp, 33060/tcp
laravel-app_web_1   nginx -g daemon off;            Up      0.0.0.0:80->80/tcp
```

## Make Laravel project

```
$ docker-compose exec app laravel new
```

## Access Laravel App

http://localhost
