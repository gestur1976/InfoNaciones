# InfoNaciones

InfoNaciones es una aplicación web desarrollada con Symfony 7 que proporciona información detallada sobre todos los países del mundo.

## Comenzando

Estas instrucciones te guiarán sobre cómo obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas.

### Prerrequisitos

Antes de clonar el proyecto, asegúrate de tener instalados:

- PHP 8.2 o superior
- Composer
- Symfony 7
- MySQL o MariaDB

### Instalación

1. **Clonar el repositorio**

   Primero, necesitas clonar el repositorio de GitHub a tu máquina local e instalar las dependencias:

   ```bash
   git clone https://github.com/gestur1976/InfoNaciones.git
   cd InfoNaciones
   composer install
   ```

   2. **Preparar la base de datos

   Necesitas confifgurar el archivo .env o .env.local con los datos de conexión a la base de datos previamente creada
   en MySQL/MariaDB y asignarle privilegios globales al usuario de la misma:

   ```mariadb/mysql
   > CREATE DATABASE infonaciones;
   > CREATE USER 'myuser' IDENTIFIED BY 'mypassword';
   > FLUSH PRIVILEGES;
   ```

   ```.env.local
   DATABASE_URL="mysql://myuser:mypassword@127.0.0.1:3306/infonaciones?serverVersion=mariadb-11.2.2-MariaDB&charset=utf8mb4"
   ```
   
   3. **Crear el esquema y realizar la importación inicial de todos los países de RestCountry:
      
   php bin/console doctrine:database:create
   php bin/console doctrine:schema:create
   bin/console app:import-country --name 'all'

   symfony server:start
   ```

   4. **Abre tu navegador y usa las siguientes URLs para consultar cada apartado (no he tenido para preparar las redirecciones
   y poner en orden las rutas debido a problema de incompatibilidad de Symfony 7 con la mayor parte de módulos de Packagist.

   http://localhost:8000/register
   http://localhost:8000/login
   http://localhost:8000/admin
