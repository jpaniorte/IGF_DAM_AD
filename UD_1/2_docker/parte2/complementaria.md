# Sesión complementaria Docker parte 2

0. [Notas importantes](#notas-importantes)
1. [Solucionar problemas con las herramientas de trabajo](#problemas-con-las-herramientas-de-trabajo-toolchain)
2. [¿Qué es docker?](#1-¿qué-es-docker)
3. [¿Qué es una imagen?](#2-¿qué-es-una-imagen)
4. [¿Qué es un contenedor?](#3-¿qué-es-un-contenedor)
5. [¿Para qué Docker en Acceso a Datos?](#4-¿para-qué-docker-en-acceso-a-datos)
6. [Recursos para repasar Docker](#recursos-para-repasar-docker)
7. [(GUIA) Imagen laravel-workspace](#imagen-laravel-workspace)

## Notas importantes

1. Inicio: 18:20h. A esa hora, MV arrancada y herrramientas preparadas.
2. Descanso: 19:20h-19:30h. El desanso se hace fuera del aula.
3. Salida: A partir de las 20:30h (motivos justificados o si has acabado todos los ejercicios)
4. No se puede salir del aula sin mi autorización:
5. Problemas con los PCs del aula. Reto 3.


## Problemas con las herramientas de trabajo (toolchain)
Un toolchain es un conjunto de herramientas de software consensuado entre todo el equipo de desarrollo. Como has podido comprobar, es importante trabajar todos con las mismas herramientas, puesto que simplifica y optimiza el trabajo en equipo.

El toolchain no debe ser algo rígido. Es más bien una forma de especificar bajo qué condiciones el software ha sido desarrollado y probado.

Para la asignatura de acceso a datos, vamos a utilizar una máquina virtual del sistema operativo Ubuntu Mate 24.04. **¡Es obligatorio usar la máquina virtual, en tu pc o en los pc del aula!**

Para iniciarla en tu equipo, debes seguir los siguientes pasos:

1. Si tienes la versión 7.1.4 de VirtualBox en tu equipo, ve al paso 5. En otro caso, desinstala VirtualBox de tu equipo. 
2. Reiniciar
3. Descargar VirtualBox 7.1.4 [enlace](https://download.virtualbox.org/virtualbox/7.1.4/VirtualBox-7.1.4-165100-Win.exe).
1. Instalar VirtualBox 7.1.4.
4. Descargar la siguiente máquina virtual (VM) [enlace](https://drive.google.com/file/d/1vRPd2OxbrzwsOo2HG6xVhlS3tTmlZWT0/view?usp=sharing).
5. Abre VirtualBox 7.1.4 y pulsa sobre el botón Herramientas/Importar. 
6. En el menu Archivo, selecciona el fichero `Ubuntu 24 Mate.ova` que has descargado.
7. En Configuración, modifica los siguientes parámetros:
    1. CPU: 2 cores
    2. RAM: 4096MB
8. Una vez importada la VM, accede al menú de configuración de la VM. Para ello, selecciona el nombre en la lista de máquinas virtuales disponibles y pulsa en Configruación.
9. Accede a la sección `Interfaz de usuario` y asegurate que la casilla `Minibarra de herramientas: Mostrar en pantalla completa/fluida` **NO está seleccionada**.
10. Ahora inicia la VM. 
    1. usuario: ad
    2. password: ad
11. Con el focus del cursor en la ventana de la VM, pulsa `ctrl + f` para entrar en modo pantalla completa. (Puedes salir de este modo pulsando de nuevo `ctrl + f`).
11. Inicia `guake`. Para ello, pulsa sobre el `Menú` y busca `guake`.
    - Opcionalmente, puedes configurar `guake` para que inicie automáticmaente al arrancar el sistema, para ello, busca en el menu `Aplicaciónes al inicio` > `Añadir`:
        - Nombre: guake
        - Comando: guake
11. Con la VM en pantalla completa, pulsa sobre el botón `F12` para abrir una nueva terminal y ejecuta:
    1. `docker run hello-wold` [comprueba que funciona]
    2. `cd workspace/IGF_DAM_AD/` 
    3. `git pull` [comprueba que funciona]
    4. `code .` [comprueba que funciona]
5. Abre el fichero `UD_1/2_docker/parte2/complementaria.md` para no tener que volver a OS anfitrión para leer este documento.
6. Con el focus en el IDE VSCode, pulsa `shift + ctrl + alt + down` para llevar el IDE al espacio de trabajo 3. A continuación pulsa sobre `F11` para visualizar el IDE a pantalla completa.
7. Vuelve al espacio de trabajo 1 pulsando `ctrl + alt + up`.
8. Abre el navegador Firefox o Chrome en el espacio de trabajo 1.
9. Prueba a cambiar de espacios de trabajo con los comandos:
    1. `ctrl + alt + up`
    1. `ctrl + alt + down`
    1. `ctrl + alt + right`
    1. `ctrl + alt + left`
9. Prueba a cambiar la ventana de espacio de trabajo con los comandos:
    1. `shift + ctrl + alt + up`
    1. `shift + ctrl + alt + down`
    1. `shift + ctrl + alt + right`
    1. `shift + ctrl + alt + left`

## FAQ
### 1. ¿Qué es Docker?
Docker es una plataforma de software que facilita la creación, el despliegue y la ejecución de aplicaciones usando contenedores.

Imagina esto: cuando desarrollas una aplicación, necesitas asegurarte de que todos los componentes, librerías y configuraciones estén en el lugar correcto para que funcione. Esto puede ser un problema si la aplicación se ejecuta en diferentes sistemas (como el ordenador de un desarrollador y el servidor de producción). Ahí es donde entra Docker. Docker crea un contenedor, que es un entorno empaquetado que incluye todo lo necesario para que la aplicación funcione correctamente.

Ventajas de Docker:

- Consistencia: Al empaquetar la aplicación con todas sus dependencias, Docker asegura que se ejecute de la misma manera en cualquier lugar.
- Portabilidad: Los contenedores Docker se pueden mover fácilmente entre entornos (desarrollo, prueba, producción) y servidores, ya que todo está empaquetado.
- Ahorro de tiempo: Al no tener que preocuparte por instalar y configurar todo manualmente, los desarrolladores pueden centrarse en escribir el código.

### 2. ¿Qué es una Imagen?
Puedes enteneder una imagen Docker como un archivo que contiene el código de la aplicación, el sistema operativo base (generalmente una versión mínima de Linux) y cualquier otro software que la aplicación necesite para funcionar.

Imagina que una imagen es como una receta de cocina. La receta te dice todos los ingredientes y los pasos necesarios para hacer un plato. De la misma forma, una imagen de Docker contiene los pasos y componentes necesarios para crear un contenedor. Una vez que tienes la receta (imagen), puedes usarla para crear tantas copias del plato (contenedores) como necesites.

Ejemplo:

- Una imagen de Docker podría tener una aplicación web construida con PHP y un servidor web.
- Otra imagen podría contener una base de datos MySQL configurada con los datos que necesita la aplicación web.
Ventajas de usar imágenes:

Las imágenes son reutilizables, lo que significa que puedes crear una imagen una vez y usarla siempre que la necesites.
Se pueden compartir fácilmente a través de un repositorio, como Docker Hub, para que otros desarrolladores puedan usarlas.
### 3. ¿Qué es un Contenedor?
Un contenedor es una instancia en ejecución de una imagen de Docker. Piensa en un contenedor como un pequeño ordenador aislado que tiene todo lo que necesita para ejecutar una aplicación específica. Aunque comparte el mismo núcleo del sistema operativo del anfitrión (la máquina donde se ejecuta), cada contenedor está aislado de los demás, como si fuera un espacio propio.

Diferencia entre imagen y contenedor:

- Imagen: Es estática y no cambia. Es como un plano o una receta.
- Contenedor: Es dinámico, se ejecuta y puede tener datos propios mientras esté en funcionamiento. Es el resultado de poner en marcha esa receta.

Ejemplo práctico:

Supongamos que tienes una imagen con una aplicación web. Al "lanzar" esa imagen, se crea un contenedor que ejecuta la aplicación.
Puedes tener varios contenedores en marcha usando la misma imagen, pero cada uno de ellos sería independiente y tendría su propia copia de la aplicación en funcionamiento.

Ventajas de usar contenedores:

- Eficiencia: Los contenedores son mucho más ligeros que las máquinas virtuales, ya que no necesitan un sistema operativo completo.
- Escalabilidad: Es fácil crear y destruir contenedores rápidamente, lo que ayuda a adaptarse a la demanda de usuarios.
- Aislamiento: Cada contenedor está aislado, lo que significa que si un contenedor falla, los demás no se verán afectados.

### 4. ¿Para qué Docker en Acceso a Datos?
En la asignatura de Acceso a Datos, necesitaremos utilizar los siguientes servicios y tecnologías:

- Aplicación Laravel 11.x (Eloquent, R/W Ficheros Json, XML, CSV)
- Base de Datos (mariaDB)
- Servidor Web (php serve)
- Almacenamiento clave-valor (Redis)
- Base de datos NoSQL (mongoDB)
- Eventos en timpo real (Laravel Echo + Soketi)

Usamos Docker porque nos permite crear rápidamente estos servicios. Además, a nivel profesional:

-  Según Datadog más del 85% de las empresas planeaban ejecutar aplicaciones contenedorizadas en producción para 2024.
    - https://www.datadoghq.com/docker-adoption/
- Según Stack-overflow, Docker es la tecnologia más deseada y la más usada
    - https://www.docker.com/blog/docker-stack-overflow-survey-thank-you-2023/
    - https://survey.stackoverflow.co/2023/#section-most-popular-technologies-other-tools

## Recursos para repasar Docker
- Si consideras que debes repasar lo aprendido en Docker (30min): https://www.youtube.com/watch?v=DWQbLJXlSS4&t=15s
- Si quieres un curso completo de Docker (6h): https://www.youtube.com/playlist?list=PLkVpKYNT_U9fXv3qEu-VIwgxsYA4jOMic

## (GUIA) Imagen laravel-workspace

Guia para crear una imagen Docker que nos permita tener todas las herramientas necesarias para trabajar con el framework Laravel.

1. Abrimos una terminal con `guake` y ejecutamos:
    1. `cd workspace && mkdir laravel-workspace && cd laravel-workspace`
    2. code .
3. Opcional: pulsar `F11` para visualizar  pantalla completa.
4. Opcional: Pulsa sobre `File > Add Folder to Workspace ..` y selecciona la carpeta IGF_DAM_AD. Abre el fichero `UD_1/2_docker/parte2/complementaria.md` y pulsa sobre `ctrl + shift +v` para abir el fichero Markdown previsualizado.
5. Abre una terminal en la carpeta `laravel-workspace` pulsando:
```
ctrl + shift + ``
```
6. ejecuta:
    1. `docker run -it -v $(pwd):/app -w /app -p 8000:8000 php:8.2-cli bash`
    2. Dentro del contenedor ejecuta:
        1. `apt-get update`
        2. `apt-get install -y curl unzip git`
        3. `curl -sS https://getcomposer.org/installer -o composer-setup.php`
        4. `php composer-setup.php --install-dir=/usr/local/bin --filename=composer`
        5. `composer global require laravel/installer`
        6. `export PATH=/root/.composer/vendor/bin:$PATH`
        6. `laravel new example-app` y selecciona:
            1. No starter kit
            2. PHPUnit
            3. SQLite
            4. Yes
        7. `cd example-app`
        8. `php artisan serve --host=0.0.0.0`
        9. Abre un navegador en `http://localhost:8000` y comprueba que ves la pantalla inicial de Laravel. Recuerda:
            - `ctrl + alt + up` -> espacio de trabajo 1 = Navegador
            - `ctrl + alt + down` -> espacio de trabajo 3 = IDE full screen

Ahora vamos a crear una imagen Docker con todas las instrucciones anteriores, de manera, que podamos crear un nuevo proyecto docker simplemente ejecutando:
```
docker run -v $(pwd):/app laravel-starter:11 bash
laravel new project
```
Para ello, vamos a crear un fichero `Dockerfile` en la carpeta `laravel-workspace` con el siguiente contenido:

```Dockerfile
FROM php:8.2-cli
WORKDIR /app
RUN apt-get update
RUN apt-get install -y curl unzip git
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer
RUN echo "export PATH=/root/.composer/vendor/bin:$PATH
" >> /root/.bashrc
```
ejecuta:
1. `docker build -t laravel-starter:11 .`
2. `docker run -it -v $(pwd):/app laravel-starter:11 bash`
3. `laravel new project`

Es posible que la carpeta project que has creado, sea propiedad de `root`. Ejecuta el siguiente comando para solucionarlo:

`chown -R ad:ad project`

Ahora vamos a crear otra imagen Docker para ejecutar "levantar" nuestra aplicacición en desarrollo. Para ello, crea un fichero Dockerfile dentro de la carpeta `laravel-workspace/project` con el siguiente contenido:

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

Ahora creamos la imagen:

`docker build -t project-dev:1 .`

y prueba los siguientes comandos:

```
## Levantar la version 1 del proyecto en segundo plano
docker run -d -p 8000:8000 project-dev:1

## Levantar mi proyecto en desarrollo (bind-mount)
docker run -it -p 8000:8000 -v $(pwd):/app project-dev:1 bash

## Generar la versión 2 de mi proyecto
docker build -t project-dev:2 .

## Levantar la version 2 de mi proyecto en segundo plano (bind-mount)
docker run -d -p 8000:8000 proyect-dev:2
```