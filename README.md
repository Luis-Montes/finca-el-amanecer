<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Instrucciones para ejecutar la aplicacion

Este proyecto es una aplicación desarrollada en **Laravel 12** que permite gestionar y administrar las operaciones de la finca *El Amanecer* de manera eficiente.

---

Antes de comenzar, asegúrate de tener instalado:

- [PHP 8.3.18](https://www.php.net/)
- [Composer ver. 2.8.9](https://getcomposer.org/)
- [Node.js y NPM](https://nodejs.org/)
- [MySQL o MariaDB](https://www.mysql.com/) (u otro motor compatible)
- [Git](https://git-scm.com/)

---

# Instalarar dependencias:
composer install
npm install

# Paquetes
composer require barryvdh/laravel-dompdf

# Configurar archivo .env:
cp .env.example .env

## Crea una base de datos y ejecuta las migraciones:
finca_el_amanecer
php artisan migrate

# crear un usuario administrador
php artisan make:admin