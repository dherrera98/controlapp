# Manual del desarrollador
## Instalación
- instalar composer.
- instalar laravel:
 ``php
composer global require laravel/installer
``
- instalar paquetes dentro del proyecto:
``
npm install
``
``
composer install
``
- Creamos una base de datos llamada control.
- Renombramos el archivo .env.example por .env
- Añadimo la configuracion de la base de datos al archivo .env
- Añadir migraciones a la base de datos:
``
php artisan make:migrations
``
- Creamos un nuevo registro en la tabla ajustes con las horas
- Ejecutamos el servidor en dos terminales diferentes, ejecutando en cada una:
``
php composer serve
``