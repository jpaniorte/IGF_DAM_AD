# Ejercicios UD3.1 - Configuración
Tiempo de realización 5h (2sesiones)

**Entrega**: Se debe entregar **únicamente** la URL de proyecto de GitHub mediante el Moodle de la escuela (igformacion.online) en la tarea asociada  **antes de finalizar el plazo de entrega**. Si corresponde, responde a las preguntas en el README.md de la raíz del proyecto.

## Ejercicio 1 (1p)

Crea un repositorio en github con el nombre "ud3_ejercicios" y asegurate que el usuario `jpaniorte` tenga acceso al código.

## Ejercicio 2 (1p)

Clona el repositorio "ud3_ejercicios" y crea un nuevo proyecto Laravel 11.x con las opciones "No starter kit" y "PHPUnit". Haz un commit con el msg "Hello World ejercicios UD3" y sube los cambios a github.

## Ejercicio 3 (1p)

Crea un fichero Dockerfile en el repositorio "ud3_ejercicios" para la configuración de la Base de datos con Docker del servicio [MariaDB](https://hub.docker.com/_/mariadb), con los siguiente parámetros:

- Nombre: mariadb-server
- Puertos: 3306
- Usuario: root
- Password: m1_s3cr3t

De tal manera que los siguientes comandos funcionen:

```bash
docker exec -it mariadb-server mariadb -u root -p
CREATE DATABASE test1;
SHOW DATABASES;
```

## Ejercicio 4 (1p)

Revisa los ficheros de la carpeta `database/migrations` y contesta a las siguientes preguntas:


1. ¿Qué crees que hace el método `create` de la clase `Schema`? 
2. ¿Qué crees que hace `$table->string('email')->primary();`?
3. ¿Cuantas tablas hay definidas? Indica el nombre de cada tabla


## Ejercicio 5 (1p)

Modifica el `.env` de tu aplicación Laravel:

```
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test1
DB_USERNAME=root
DB_PASSWORD=m1_s3cr3t
```
Nota: Si al ejecutar php artisan migrate aparece un error relacionado con el driver, puedes instalarlo con `sudo apt install php8.3-mysql`

Ejecuta los siguientes pasos y contesta a las preguntas:

1. Ejecuta el comando `php artisan config:clear` para limpiar y cachear la configuración de Laravel.
2. Ejecuta el comando `php artisan migrate` para crear las tablas por defecto definidas en la carpeta `database/migrations`
3. Muestra las tablas:

```bash
docker exec -it mariadb-server mariadb -u ig -p
USE test1;
SHOW TABLES;
```

- ¿Cuántas tablas aparecen?

## Ejercicio 6 (1p)

Indica qué realiza los siguientes comandos:

- `php artisan migrate`: 
- `php artisan migrate:status`:
- `php artisan migrate:rollback`:
- `php artisan migrate:reset`:
- `php artisan migrate:refresh`:
- `php artisan make:migration`:
- `php artisan migrate --seed`:

## Ejercicio 7 (1p)

Crea la base de datos test2 y conecta tu aplicación a dicha base de datos. Emplea el comando `php artisan make:migration my_test_migration` para crear el fichero `database/migrations/<timestamp>_my_test_migration.php`. Abre el fichero y observa que hay dos métodos: `up()` y `down()`

Inserta el siguiente código en la función `up()`;

```bash
Schema::create('alumnos', function (Blueprint $table) {
    $table->id(); 
    $table->string('nombre'); 
    $table->string('email')->unique(); 
    $table->timestamps(); 
});
```

y el siguiente en la función `down()`:

```bash
Schema::dropIfExists('alumnos');
```

Ejecuta las migraciones con `php artisan migrate` y asegurate que existe la tabla:

```bash
docker exec -it mariadb-server mariadb -u ig -p
USE test2;
SHOW TABLES;
```
## Ejercicio 8 (1p)

¿Qué pasos debemos dar si queremos añadir el campo `$table->string('apellido');` a la tabla alumnos del ejercicio anterior?

## Ejercicio 9 (1p)

Con los siguientes comandos, podemos obtener el contenido de la tabla alumnos:

```bash
docker exec -it mariadb-server mariadb -u ig -p
USE test2;
SELECT * FROM alumnos;
```

Como podemos observar, la tabla `alumnos` no contiene datos. En Laravel, podemos crear datos de prueba de nuestra aplicación a través del `Seeder` (https://laravel.com/docs/11.x/seeding). Vamos a crear unos datos de prueba para la tabla alumnos:

1. Crea un nuevo seeder con el comando: `php artisan make:seeder AlumnosTableSeeder`
2. En el fichero que se ha creado en la carpeta `database/seeders` añade a la funcion `run()`:

```php
DB::table('alumnos')->insert([
    [
        'nombre' => 'Juan Pérez',
        'email' => 'juan.perez@example.com',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'nombre' => 'María González',
        'email' => 'maria.gonzalez@example.com',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'nombre' => 'Carlos López',
        'email' => 'carlos.lopez@example.com',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    ]);
```

3. Abre el archivo `database/seeders/DatabaseSeeder.php` y añade a la llamada al nuevo seeder en la función `run()`:

```php
$this->call(AlumnosTableSeeder::class);
```

4. Ejecuta: `php artisan db:seed`
5. Muestra el contenido de la tabla alumnos y comprueba que se han creado correctamente.

## Conceptos clave para el Ejercicio 10

Modelar datos en un diagrama Entidad-Relación nos permite representar de manera gráfica y conceptual la estructura de los datos de un sistema. Este modelo se utiliza principalmente en la etapa de diseño de bases de datos para comprender, organizar y definir cómo se almacenarán los datos y cómo se relacionarán entre sí.

- Entidades: Representan objetos del mundo real que tienen existencia y de los cuales queremos almacenar información.
Ejemplo: Alumno, Asignatura, Profesor.

- Atributos: Son las propiedades o características que describen una entidad.
Ejemplo: Para la entidad Alumno, los atributos pueden ser id, nombre, email.

- Clave primaria (PK):
Es un atributo (o combinación de atributos) que identifica de manera única cada instancia de una entidad.
Ejemplo: id es la clave primaria de la entidad Alumno.

- Relaciones:
Representan las asociaciones entre dos o más entidades. Pueden ser:

    - Uno a uno (1:1): Cada registro de una entidad se asocia con un único registro de otra.
    - Uno a muchos (1:N): Un registro de una entidad puede relacionarse con varios registros de otra entidad.
    - Muchos a muchos (N:M): Varios registros de una entidad pueden relacionarse con varios registros de otra entidad. En este caso, se utiliza una tabla intermedia.

- Clave foránea (FK): Es un atributo que referencia a la clave primaria de otra tabla, permitiendo establecer relaciones entre entidades.

## Ejercicio 10 (1p)

Supongamos que trabajamos en una empresa que quiere implementar un sistema para gestionar las notas de los alumnos en diferentes asignaturas y os proporciona el siguiente diagrama E-R.

```bash
+-----------------+           +-----------------+           +-----------------+
|     Alumno      |           |     Nota        |           |   Asignatura    |
+-----------------+           +-----------------+           +-----------------+
| id (PK)         |<---+      | id (PK)         |      +--->| id (PK)         |
| nombre          |    +------| alumno_id (FK)  |      |    | nombre          |
| email           |           | asignatura_id(FK)|------+    | descripcion     |
+-----------------+           | nota            |           +-----------------+
                              | created_at      |
                              | updated_at      |
                              +-----------------+
```
Crea una base de datos llamada `gestion_notas` e implementa las tablas mediante migraciones de Laravel. Añade algunos datos de prueba mediante `Seeder`.
