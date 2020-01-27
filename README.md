# OctopusBolg Challenge

Blog simple para la empresa Octopus

## Especificaciones 

● Lenguajes usados: Php 7.2, javascript

● Frameworks usados: Laravel 6.2 ,Vue

● Módulos principales: npm, composer

● Instrucciones de cómo correr una instancia de su aplicación.

## Requerimientos

php 7.2

apache 2.4

composer 1.6

npm 6.13


## Instalacion

crear directorio de instalacion del proyecto
```
mkdir ~/blogoctopus

cd ~/blogoctopus 
```
descarcagar el proyecto
```
git clone https://github.com/agrup/Challenge-Octopus.git Blog

cd Blog
```
instalacion de dependencias 

```
composer install

npm install

npm run dev 

```

crear base de datos
```
createdb octopus_blog -U postgres
```

Configuracion

```
cp .env.example .env 

```
Abrir el archivo .env y agregar los datos correspondientes a la base de datos y al proyecto

```
APP_NAME=BlogOctopus

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=octopus_blog
DB_USERNAME=postgres
DB_PASSWORD=postgres

```
Correr la migracion y los seed

```
php artisan migrate

php artisan db:seed

```
Regenerar el api key

```
php artisan key:generate

```

Generar el link simbolico a los archivos publicos

```
php artisan storage:link

```

## Correr en modo dev
```
    php artisan serve
```

acceder a localhost:8000 

## correr con apache

Creacion del virtual host
```
sudo a2enmod rewrite

chmod -R 775 storage bootstrap/cache

sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/laravel.conf
```
editar el archivo laravel_project.conf
```
sudo nano /etc/apache2/sites-available/laravel_project.conf

```

completar con la siguiente configuracion modificando 


```
NameVirtualHost *:8080
Listen 8080
 
<VirtualHost *:8080>
    ServerAdmin admin@example.com
    ServerName laravel.dev
    ServerAlias www.laravel.dev
    DocumentRoot /path/a/laravel/projecto/laravel/public
     
    <Directory /path/a/laravel/projecto/laravel/public/>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
    </Directory>
     
    LogLevel debug
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

ACLARACION: colocar en DocumentRoot y Directory el path al directorio donde se descargo el proyecto

agregar el host virtual 
editar el archivo /etc/hosts
```
sudo nano /etc/hosts

```

agregar el  siguiente contenido

```
127.0.0.1 loclahost octopus.blog
```

habilitar el host virtual

```
sudo a2ensite laravel_project.conf
```

reiniciar apache

```
sudo service apache2 restart
```