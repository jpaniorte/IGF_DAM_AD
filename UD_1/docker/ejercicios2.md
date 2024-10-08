# Ejercicios Docker parte 2

Para realizar los siguientes ejercicios, debes realizar los 6 apartados "Proyecto Laravel con Docker" que puedes encontrar en las transparencias Docker - parte 2. 

Vamos a suponer que tenemos un repositorio remoto llamado laravel-example-app, con un commit inicial con el msg "Hello world docker" con la siguiente estructura:


```sh
.
├── Dockerfile
└── example-app
    ├── README.md
    ├── app
    ├── artisan
    ├── bootstrap
    ├── composer.json
    ├── composer.lock
    ├── config
    ├── database
    ├── package.json
    ├── phpunit.xml
    ├── public
    ├── resources
    ├── routes
    ├── storage
    ├── tests
    ├── vendor
    └── vite.config.js

12 directories, 8 files
```

También puedes realizar un fork del siguiente repositorio: https://github.com/jpaniorte/laravel-example-app

## Ejercicio 1

Vamos a trabajar en el Dockerfile. En primer lugar, debes leer la documentación de todas las etiquetas disponibles: https://docs.docker.com/reference/dockerfile/

En particular, presta especial atención a las etiquetas:
- ADD
- CMD
- COPY
- ENV
- EXPOSE
- ENTRYPOINT
- FROM
- LABEL
- RUN
- WORKDIR

## Ejercicio 2

Vamos a establecer el directorio `/app` para que sea el directorio de trabajo. Primero, comprueba cual es el directorio por defecto actualmente:

```bash
docker run -it laravel-example-app:1 bash
root@6c1e46755055:/# pwd
/
```
Esto quiere decir, que el directorio por defecto de tu contenedor es la `/`, es decir, la raíz del sistema. Para modificarlo, añade a tu Dockerfile la siguiente etiqueta:

```Dockerfile
FROM php:8.2-cli

WORKDIR /app

RUN apt-get update
RUN apt-get install -y curl unzip
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

Y ejecuta:

```
docker build laravel-example-app:2 .
docker run -it laravel-example-app:2 bash
pwd
```
Comprueba que el directorio por defecto es `/app`

## Ejercicio 3

Haz los cambios necesario para generar una versión 3 de la imagen con todos los ficheros de la carpeta `example-app `en la carpeta `/app`. Para facilitar la tarea, sigue estos pasos:

1. Comprueba entrando por bash a la versión 2, que la carpeta `/app` no tiene la carpeta `example-app`.
2. Haciendo uso de la etiqueta `ADD`, modifica el Dockerfile para que cuando construyas la versión
3. incluya la carpeta `example-app` dentro de la carpeta `/app`.
4. Construye una versión 3 con `docker build`.
5. Comprueba entrando por bash a la versión 3, que existen todos los ficheros en la carpeta `app/example-app`.
6. ¿Qué diferencias hay entre ADD y COPY?


## Ejercicio 4

Genera la versión 4 de tu imagen, añadiendo el editor de texto por consola `nano`.

## Ejercicio 5

Ahora vamos a establecer un CMD por defecto a nuestra imagen. Nuestro objetivo es poder lanzar la imagen en segundo plano (-d) y que ejecute el servidor web de desarrollo, es decir, el siguiente comando: `docker run -d -p 8000:8000 laravel-example-app:5` debe ejecutar `php artisan server --host 0.0.0.0`. Para ello, añade al Dockerfile:

```Dockerfile
FROM php:8.2-cli

WORKDIR /app

RUN apt-get update
RUN apt-get install -y curl unzip
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ADD example-app /app

CMD php artisan server --host 0.0.0.0
```

Genera la imagen con la versión 5 y comprueba que se inicia el servidor web con nuestra aplicación example-app. 

Comprueba además, que con `docker logs -f <nombre>`, puedes ver los logs del servidor web de desarrollo.

**Explicación:** Ten en cuenta, que este contenedor tendrá una versión definitiva (o almenos, candidata) de tu aplicación y se usará para tener el servicio en producción (con lo cual, sería recomendable usar otro Dockerfile con php-pfm para este proposito). Otra funcionalidad muy útil, es cuando estás desarrollando el `frontend` de tu aplicación y necesitas un `backend` funcionando para validar tu desarrollo.

## RETO

El reto consistirá en generar otro contenedor workspace para otro framework. Puedes elegir entre frameworks frontend: `VueJs, angular, Reac` o backend: `SpringBoot, Django`. Se debe entregar a través del Aula Virtual los enlaces a un contenedor disponible a través de DockerHub y un repositorio público en GitHub con el Dockerfile y una carpeta del projecto.



