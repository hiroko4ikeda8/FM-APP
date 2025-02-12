# Docker環境の設定

## 1.docker-compose.yml の作成

以下のコードをdocker-compose.ymlにコピペしてください。

```
version: '3.8'

services:
    nginx:
        image: nginx:1.21.1
        ports:
            - "80:80"
        volumes:
            - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
            - ./src:/var/www/
        depends_on:
            - php

    php:
        build: ./docker/php
        volumes:
            - ./src:/var/www/

    mysql:
        image: mysql:8.0.26
        environment:
            MYSQL_ROOT_PASSWORD: root
            MYSQL_DATABASE: laravel_db
            MYSQL_USER: laravel_user
            MYSQL_PASSWORD: laravel_pass
        command:
            mysqld --default-authentication-plugin=mysql_native_password
        volumes:
            - ./docker/mysql/data:/var/lib/mysql
            - ./docker/mysql/my.cnf:/etc/mysql/conf.d/my.cnf

    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        environment:
            - PMA_ARBITRARY=1
            - PMA_HOST=mysql
            - PMA_USER=laravel_user
            - PMA_PASSWORD=laravel_pass
        depends_on:
            - mysql
        ports:
            - 8080:80
```


## 2.Nginx の設定

Nginx は、ローカルサーバの設定になります
以下のコードをdocker/nginx/ディレクトリ以下に作成したdefault.confにコピペしてください。

```
server {
    listen 80;
    index index.php index.html;
    server_name localhost;

    root /var/www/public;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}
```


## 3. PHP の設定

Laravelの開発環境をDockerで構築するため、以下のようにDockerfileを作成します。
以下のコードを./docker/php以下に作成された Dockerfile を使って設定します。
コピペしてください。

```
FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www
```


## 次に、php.iniの設定をします

docker/php以下のphp.iniファイルにコピペします。

```
date.timezone = "Asia/Tokyo"

[mbstring]
mbstring.internal_encoding = "UTF-8"
mbstring.language = "Japanese"
```

## 4. MySQL の設定

docker/mysqlディレクトリ以下にある、volumesでマウントするためのmy.cnfにコピペしてください。

```
[mysqld]
character-set-server = utf8mb4

collation-server = utf8mb4_unicode_ci

default-time-zone = 'Asia/Tokyo'
```

※docker/mysqlディレクトリ以下にあるdataディレクトリは、必ず「カラ」にしておきます。
「カラ」にしておかないと、docker-compose 起動時にデータベースの作成に失敗する可能性があります。


## 5. docker-compose コマンドでビルド

開発環境を構築しますので、以下のコマンドを入力してください。

```
$ docker-compose up -d --build
```

実行が終わったら、「Docker Desktop for windows」を確認しましょう。
FM-APPコンテナが作成されていれば成功です。

コンテナが正しく起動しているか確認するには、以下のコマンドを実行します。

```
$ docker ps
```


## 6. phpMyAdmin の設定

phpMyAdmin は、ブラウザからデータベースを操作をすることができるツールです。

ビルド後に、http://localhost:8080/からアクセスすることができるようになります。
データベースにテーブルを作成したタイミングで、確認してみてください。


これで、Laravelの開発環境がDocker上で立ち上がります。


# 次に、Laravelプロジェクトの作成をします

詳細な手順については、[laravel-setup.md](laravel-setup.md)を参照してください。

READMEに戻る # [README.md](../README.md)



