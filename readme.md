# README.MD
Proyecto realizado para prueba de examen de programador backend.

## Content
Este proyecto contiene dos ramas, la rama master y la rama dev, las cuales se utilizan de la siguiente manera, **master** se utiliza para enviar a producción y **dev** para realizar todas las pruebas en desarrollo.

## Demo
Para poder ver la demo del proyecto, se puede visitar [Demo del proyecto](http://167.172.192.114/)


## How to clone
Para poder clonar este repositorio
* git clone https://github.com/GrupoWeb/test_backend


## Installation
Para instalar y ejecutar este proyecto simplente escribir y ejecutar:
```bash
composer install
```
```bash
npm install 
```
```bash
cp .env.example .env
```
Crear la base de datos:
```bash
CREATE DATABASE backend_test
```
llenar los datos en el archiv .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=backend_test
DB_USERNAME=root
DB_PASSWORD=
```
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan serve
```

visualizar en el navegador:
```bash
http://127.0.0.1:8000/
```

