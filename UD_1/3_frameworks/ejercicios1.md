# Ejercicios Frameworks parte 1

## Ejercicio 1

Realiza el siguiente curso de Laravel 11.x desde cero:
https://aprendible.com/series/curso-laravel-desde-cero

Es interesante que revises de la UD 2, `ficheros-laravel` e incluso, realices el reto en paralelo.

## Reto

Crea un repositorio en GitHub con el nombre `frameworks-laravel`. Haz el repositorio privado y asegurate de que el usuario `jpaniorte` tenga permisos de lectura/escritura.

Crea un proyecto Laravel 11.x. Para superar el reto, nuestra aplicación debe superar las siguientes pruebas.

#### Prueba 1

```bash
curl -O "http://localhost:8000/api/hello?name=jose"
```
=> devuelve: "Hello World Jose"

#### Prueba 2

```bash
curl -O "http://localhost:8000/api/hello?name=acceso_datos"
```
=> devuelve: "Hello World acceso_datos"

### Automatización de la corrección

Añade los siguientes ficheros a tu repositorio para que con cada commit a master, se ejecuten una bateria de pruebas automáticas en tu aplicación y obtener la corrección de la misma.

### Entrega

Enlace a la salida de github actions con más puntuación a través del aula virtual.