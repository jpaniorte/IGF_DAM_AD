# Ejercicios Laravel Parte 1

## Ejercicio 1

Crea un nuevo proyecto Laravel 11.x con el nombre `aprendiendo-laravel`. Puedes seguir las siguientes instrucciones:

### Instrucciones para crear un proyecto Laravel

1. Actualiza el proyecto `IGF_DAM_AD` (git pull).
2. Abre una terminal y situate en la carpeta `IGF_DAM_AD/UD_1/3_laravel/laravel-starter`.
3. Ejecuta `docker build -t laravel-starter:11 .`
4. Ejecuta `docker run -it -p 8000:8000 -v $(pwd):/app laravel-starter:11 bash`
5. Dentro del contenedor, ejecuta: `laravel new aprendiendo-laravel`.
6. Comprobaciones:
    - Dentro del contenedor ejecuta `cd aprendiendo-laravel`
    - Dentro del contenedor ejecuta `php artisan serve --host=0.0.0.0`
    - Abre un navegador y comprueba que en `http://localhost:8000` se visualiza la página inicial de Laravel.
    - Cierra el servicio web (ctrl + c)
    - Sal de contenedor (exit)
7. Mueve la carpeta `aprendiendo-laravel` a la carpeta `workspace` ejecutando: `mv aprendiendo-laravel ~/workspace`
8. Ejecuta: `cd`
9. Ejecuta: `cd workspace`
10. Ejecuta: `code .` para abrir todos los proyectos de la carpeta workspace con VSCode.

## Ejercicio 2

Ahora vamos a levantar el entorno de desarrollo. Puedes seguir las siguientes instrucciones:

### Instrucciones para levantar el entorno de desarrollo laravel 11.x

1. Crea un fichero `Dockerfile` en el proyecto `aprendiendo-laravel` con el siguiente contenido:

```Dockerfile
FROM php:8.2-cli
WORKDIR /app
COPY . .
RUN apt-get update
RUN apt-get install -y curl unzip git
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer
CMD php artisan serve --host=0.0.0.0
```
2. Abre una terminal y situate en la carpeta `workspace/aprendiendo-laravel`
3. Ejecuta: `docker build -t aprendiendo-laravel .`
4. Ejecuta: `docker run -d -v $(pwd):/app -p 8000:8000 aprendiendo-laravel`
5. Comprueba que en la salida `docker ps` aparece un contenedor con la imagen `aprendiendo-docker` con el status `UP`.
6. Abre la URL `http://localhost:8000` y comprueba que aparece la pantalla principal de Laravel.

## Ejercicio 3

Ahora vamos a crear un endpoint `/api/hello` en nuestro proyecto Laravel que devuelva el msg `Hello world`, para ello:

1. Accede al contenedor de desarrollo ejecutando: `docker exec -it <container_name> bash`
2. Dentro el contenedor ejecuta: `php artisan install:api` (Introudce Yes para las migraciones pendientes).
3. En el VSCode, abre el fichero `aprendiendo-laravel/routes/api.php` y añade el siguiente contenido:

```php
Route::get('/hello', function () {
    return 'hello world';
});
```
4. Abre una nueva terminal y ejecuta: `curl http://localhost:8000/api/hello`

## Ejercicio 4

Vamos a crear el endpoint `/hello/{name}` para ello, añade el siguiente contenido al fichero `routes/api.php`:

```php
Route::get('/hello/{name}', function ($name) {
    return 'hello world ' . $name;
});
```

Abre una terminal y ejecuta: `curl http://localhost:8000/api/hello/jose`

## Ejercicio 5

Durante el ejercicio 3 y 4, hemos creado dos endpoint (`/hello` y `/hello/{name}`) con una lógica muy simple: devolver un msg. Sin embargo, es una buena práctica usar controladores en lugar de dejar la lógica directamente en las rutas (routes/api.php):

- Principio de "Single Responsibility" (Responsabilidad Única) de la arquitectura SOLID, donde **cada parte del código tiene una única razón para cambiar**. Las rutas solo cambian si se modifican las URLs, y la lógica del controlador cambia si se altera la funcionalidad.

- A medida que una aplicación crece, mantener toda la lógica en el archivo routes/api.php puede volverse difícil de manejar. Los controladores ayudan a organizar el código, especialmente si una ruta tiene lógica compleja o si se necesita manejar múltiples rutas relacionadas.

Por lo tanto, vamos a crear el controlador `HelloController` para manejar las rutas:

1. Accede al contenedor de desarrollo ejecutando: `docker exec -it <container_name> bash`
2. Ejecuta: `php artisan make:controller HelloController`
3. Abre el fichero que acabamos de crear `HelloController.php` de la carpeta `app/Http/Controllers.`
4. Añade el siguiente contenido:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function greet()
    {
        return 'hello world';
    }

    public function greetWithName($name)
    {
        return 'hello world ' . $name;
    }
}
```
Ahora, abre el archivo `routes/api.php` y define las rutas para que utilicen el HelloController:

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'greet']);
Route::get('/hello/{name}', [HelloController::class, 'greetWithName']);
```

Comprueba que las siguientes prueba continuan funcionando:

```bash
curl http://localhost:8000/api/hello
curl http://localhost:8000/api/hello/jose
```

## Ejercicio 6

Es altamente recomendable realizar el siguiente curso de [Laravel 11.x desde cero](https://aprendible.com/series/curso-laravel-desde-cero) o como mínimo, visualizar los videos 5, 7, 8, 9, 10, 11.

## Reto

Crea un repositorio en GitHub con el nombre `laravel-reto`. Haz el repositorio privado y asegurate de que el usuario `jpaniorte` tenga permisos de lectura/escritura. A continuación, crea un proyecto Laravel 11.x con los siguientes parámetros:
- No starter kit
- PHPUnit
- SQLite
- Yes

En este reto, vamos a emplear `Desarrollo guiado por pruebas` (`Test Driven Development` o `TDD` por sus siglas en inglés). En esta práctica de la ingeniería del software, antes de escribir la lógica de nuestra apliación, implementamos un test. Puedes ampliar más sobre esta práctica [aqui](https://www.paradigmadigital.com/dev/tdd-como-metodologia-de-diseno-de-software/).

En primer lugar, vamos a implementar un test para el controlador HelloController, ejecuta:
```bash
docker exec -it <container_name> bash
php artisan make:test ApiTest
```
Abre el fichero `tests/Feature/ApiTest.php` y vamos a implementar dos tests para las dos rutas:

```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function test_api_hello()
    {
        $response = $this->get('/api/hello');
        $response->assertStatus(200);
        $response->assertSee('hello world');
    }

    public function test_api_hello_jose()
    {
        $response = $this->get('/api/hello/jose');
        $response->assertStatus(200);
        $response->assertSee('hello world jose');
    }
}
```

Para lanzar los tests, ejecuta:

```bash
docker exec -it <container_name> bash
php artisan test
```
Y la salida debe ser parecida a esta:

```bash
root@2b12022e8aa5:/app# php artisan test

   PASS  Tests\Feature\ApiTest
  ✓ api hello                                                                                         0.14s  
  ✓ api hello jose                                                                                    0.01s  

  Tests:    2 passed (4 assertions)
  Duration: 0.22s
```

Ahora queremos definir un nuevo endpoint que nos permita que el parámetro `$name` se pase como parte de la cadena de consulta (query string) en lugar de como un segmento de URL. Es decir, hemos implmentado este endpoint `/hello/jose` y queremos este otre endpoint: `/param/hello?name=jose`.

Para ello, debes añadir el siguiente test al fichero `ApiTest.php`:

```php
public function test_api_params_hello(): void
{
    $response = $this->get('/api/params/hello?name=jose');

    $response->assertStatus(200);
    $response->assertSee('hello world jose');
}
```
Y ejecutamos:
```bash
docker exec -it <container_name> bash
php artisan test
```
Y la salida debe ser parecida a esta:

```bash
root@2b12022e8aa5:/app# php artisan test

   FAIL  Tests\Feature\ApiTest
  ✓ api hello                                                                                         0.15s  
  ✓ api hello jose                                                                                    0.01s  
  ⨯ api params hello                                                                                  0.06s  
  ───────────────────────────────────────────────────────────────────────────────────────────────────────── 
``` 

Donde nos indica que el test `test_api_params_hello` no ha funcionado. Crea todo lo necesario para que el test funcione.

Indicaciones:
1. Crea la siguiente ruta en `routes/api.php`:

```php
Route::get('/params/hello', [HelloController::class, 'greetWithParams']);
```
2. Crea el siguiente método en `HelloController`:
```php
public function greetWithParams(Request $request)
{
    // añade la lógica aqui
}
```

Opcional: Haciendo uso de GitHub Actions, con cada commit a la rama `main` de tu proyecto, ejecuta todos los test. Si estos acaban en `PASS`, publica la imagen en DockerHub.


### Entrega

Enlace al repositorio de GitHub a través del Aula Virtual.