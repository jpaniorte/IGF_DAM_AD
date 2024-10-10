# Ejercicios Docker parte 3

> Si consideras que debes repasar lo aprendido en Docker (30min): https://www.youtube.com/watch?v=DWQbLJXlSS4&t=15s

> Si quieres un curso completo de Docker (6h): https://www.youtube.com/playlist?list=PLkVpKYNT_U9fXv3qEu-VIwgxsYA4jOMic

## Ejercicio 1

Revisa que cumples los requisitos para realizar el Quickstart propuesto por Docker: https://docs.docker.com/compose/gettingstarted/ y a continuación, realízalo.

## Ejercicio 2 

Clona el proyecto Awesome-compose: https://github.com/docker/awesome-compose/tree/master y revisa el Readme.md de official-documentation-samples/wordpress (https://github.com/docker/awesome-compose/tree/master/official-documentation-samples/wordpress). Presta especial atención a la configuración de la base de datos MariaDB, es muy posible que la necesites en un futuro cercano.

## Ejercicio 3

Levanta un entorno de desarrollo para Django (https://github.com/docker/awesome-compose/tree/master/official-documentation-samples/django).

## Ejercicio 4

Levanta un entorno de desarrollo para SpringBoot (https://github.com/docker/awesome-compose/tree/master/spring-postgres).

## Ejercico 5

Revisa todos los servicios que hay disponibles en el proyecto Awesome-compose y dedica un tiempo a revisar cada una de las tecnologías que hay. Por ejemplo, para la primera carpeta, `Angular`:

Angular es un framework para aplicaciones web desarrollado en TypeScript, de código abierto, mantenido por Google (https://angular.dev/).
El fichero compose.yml únicamente tiene un servicio: `web`. Este servicio se construye con la etiqueta `build` apuntando el contexto a la carpeta angular y al stage `builder`. Dentro de esta carpeta encontramos un Dockerfile:

```Dockerfile
# syntax=docker/dockerfile:1.4
FROM --platform=$BUILDPLATFORM node:17.0.1-bullseye-slim as builder

RUN mkdir /project
WORKDIR /project

RUN npm install -g @angular/cli@13

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
CMD ["ng", "serve", "--host", "0.0.0.0"]

FROM builder as dev-envs

RUN <<EOF
apt-get update
apt-get install -y --no-install-recommends git
EOF

RUN <<EOF
useradd -s /bin/bash -m vscode
groupadd docker
usermod -aG docker vscode
EOF
# install Docker tools (cli, buildx, compose)
COPY --from=gloursdocker/docker / /

CMD ["ng", "serve", "--host", "0.0.0.0"]
```
Este Dockerfile, hace uso de Multi-stage builds (https://docs.docker.com/build/building/multi-stage/). Los Multi-stage builds son útiles para optimizar Dockerfiles y al mismo tiempo mantenerlos fáciles de leer. En este caso, usamos un contenedor node:17.0.1-bullseye-slim como `builder` donde levantamos un entorno de desarollo. Sin embargo, para el entorno de dev-envs, creo un contenedor que tiene git, VSCode y docker, de manera que puedo programar directamente en él. Prueba a ejecutar `docker build --target dev-envs -t angular-dev-envs:1 .` para generar una imagen angular-dev-envs:1 y prueba a lanzarla con `docker run -it -p 4200:4200 angular-dev-envs:1 bash` y prueba que tienes vscode y git en su interior.

## RETO

Crea un repositorio remoto público (o asegúrate que el usuario `jpaniorte` tiene acceso) con el nombre laravel-project. Haciendo uso del proyecto Laradock (https://laradock.io/introduction/) crea un proyecto Laravel (https://laradock.io/getting-started/#a-2-don-t-have-a-php-project-yet) con los siguientes servicios:

- adminer
- mailhog
- mariadb
- nginx
- php-fpm
- php-worker
- redis
- workspace

Para comenzar, crea una carpeta en tu equipo llamada `laravel-project` e inicializa el sistema de control de versiones. Crea un fichero README.md con el siguiente contenido:

```markdown
# Laravel Project

## How to use
...
```
Y sincroniza tus cambios con el repositorio remoto con el msg: `Hello world laravel-project`. Ahora, realiza un 
fork del projecto laradock y  haciendo uso de `submodulos` (https://git-scm.com/book/en/v2/Git-Tools-Submodules) añade el projecto como un submodulo:

```bash
git submodule add https://github.com/usuario/submodulo.git laradock
git commit -am "Añadir submódulo: laradock"
git submodule init
git submodule update
```

Ahora vamos a comenzar un proyecto Laravel, ves a la carpeta laradock y ejecuta:

```bash
cp .env.example .env
## Revisa los parámetros de .env
docker compose up -d workspace
docker compose exec workspace bash
## Dentro del contenedor
composer create-project --prefer-dist laravel/laravel backend  "11.*"
exit
```

Comprueba que en la carpeta `laravel-project` tienes una carpeta `backend` y otra laradock. Confirma tus cambios con "Projecto Laravel iniciado".

Recomiendo abrir `laravel-project` con VSCode y abrir una terminal en el IDE (terminal > nuevo terminal).

Para lanzar el servidor de desarrollo:

```bash
docker compose exec workspace bash
cd backend
php artisan serve --host=0.0.0.0
```

Comprueba que puertos tiene abierto el contenedor workspace y abre el navegador en la ruta:
`http://localhost:<puerto>`

**Entrega:** Sube un contenedor de cada servicio a tu DockerHub con el nombre laravel-servicio, es decir: laravel-adminier, laravel-mailhog, laravel-mariadb, etc. Entrega las URLs de cada servicio y la URL de projecto de gitHub.