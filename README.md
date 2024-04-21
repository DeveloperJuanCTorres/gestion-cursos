<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Documentación

A continuacion indicaré pasos a seguir para correr el Backend satisfactoriamente

- Debido a la actualizacion de Laravel 11 deben tener Node.js con una version igual o superor a 18.
- Composer con una version igual o superior a 2.2.
- Para importar las dependencias ejecutar el comnando:
npm install

Laravel es accesible, potente y proporciona las herramientas necesarias para aplicaciones grandes y sólidas.

## Importar la Base de Datos

- Debes crear una base de datos vacía.
- En el archivo .env debes colocar el nombre de la base de datos que creaste con sus credenciales.
- Una vez habiendo configurado el archivo .env con la base de datos ejecutar el comando:
"php artisan migrate --seed"
para importar la base de datos con datos de prueba.

