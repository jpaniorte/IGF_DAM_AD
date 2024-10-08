# Ejercicios Docker parte 1

## Ejercicio 1

1. Abre una terminal y ejecuta el siguiente comando:
   ```bash
   docker run -it ubuntu:22.04 bash
   ```
2. Una vez dentro del contenedor, prueba algunos comandos de Linux, como `ls`, `pwd`, o `echo "Hello World"`.
3. Cuando termines, escribe `exit` para salir del contenedor.

**Explicación**: El flag `-it` combina dos opciones:
- `-i` (interactive): Mantiene la entrada estándar (stdin) abierta.
- `-t` (tty): Asigna un terminal al contenedor, lo que permite interactuar con él.

## Ejercicio 2

1. Ejecuta el siguiente comando:
   ```bash
   docker run -d ubuntu:22.04 -c "while true; do echo 'Hello World'; sleep 2; done"
   ```
2. Este comando ejecutará un contenedor que cada 2 segundos mostrará "Hello World".
3. Usa `docker ps` para ver los contenedores en ejecución y verifica que tu contenedor esté en la lista.
4. Usa `docker ps` para obtener el nombre del contenedor, y luego `docker logs -f <nombre>` para mostrar los logs. Comprueba que cada 2sg aparece un "Hello world"

**Explicación**: El flag `-d` (detached) ejecuta el contenedor en segundo plano, permitiendo que la terminal esté disponible para otros comandos. No puedes interactuar directamente con el contenedor en este modo.

## Ejercicio 3

1. Para la consola donde has lanzado `docker logs -f <nombre>`.
2. Para el contenedor usando `docker stop <nombre>`.
3. Comprueba con `docker ps` que no tienes ningún contenedor en ejecución.
4. Comprueba con `docker ps -a` todos los contenedores parados y en ejecución.
5. Lanza `docker start <nombre>` para arrancar de nuevo el contenedor.
6. Comprueba que continuan saliendo los "Hello world".

## Ejercicio 4

1. Ejecuta `docker run -d ubuntu sleep 300`. (Nota, sleep es un comando de bash que nos permite "dormir" ese hilo de ejecución durante un tiempo en segundos).
2. Ejecuta `docker ps` para comprobar el nombre del contenedor y que esta su estado es Running.
3. Ejecuta `docker exec -it <nombre> bash` para "conectar" al contenedor en ejecución y ejectua el comando `ps aux`.
4. Valida que como PID1 aparece el comando `sleep 300` y además, aparece otro PID con el proceso bash que has ejecutado con el docker exec.
5. Comprueba que tras 5min, el contenedor se para automáticamente.

**Explicación**: Podemos tener un contenedor en ejecución y "conectarnos" a él a través de un shell.

## Ejercicio 5
Con la opción `-p`, podemos "mapear" un puerto del sistema con un puerto de contenedor. Con la opción `--name`, podemos darle un nombre a ese contenedor. Ojo! No puedes tener dos contenedores con el mismo nombre!.

1. Ejecuta `docker run -it --name nginx_manual -p 80:80 ubuntu:22.04 bash`

Ahora vamos a instalar un servidor web llamado Nginx en ese contenedor. Para ello, ejecuta:

1. `apt update`
2. `apt install -y nginx`
3. `ps aux` => comprueba que no tienes el servicio nginx
4. `nginx` => arranca el servicio nginx

Abre un navegador web en la dirección `localhost:80` y comprueba que puedes ver el servicio Nginx.

Ahora, sal del contenedor con `exit`. ¿Qué ha pasado con el servidor web? ¿Podrías arrancar de nuevo el servidor?

**Explicación**: Al tener el PID1 como bash, al iniciar el docker con `docker start` no se arranca el servidor Nginx, por lo tanto, hemos perdido todas las configuraciones que hemos realizado dentro de este contenedor. Este ejercicio nos sirver para comprender las malas praxis con Docker.

## Ejercicio 6
Ahora vamos a iniciar el servidor web a partir de la imagen oficial:

1. `docker run -d -p 80:80 nginx`
1. Comprueba que nuevamente aparece el mensaje de bienvenida de nginx en la ruta `http://localhost`

Prueba a parar y arrancar el servicio con los comando `docker stop` y `docker start`.

**Explicación**: Al contrario de lo ocurrido en el ejercicio 5, ahora si podemos arancar y parar el servidor web. Es importante usar las imagenes oficiales y no "tratar" de instalar el servicio desde una imagen ubuntu.

## Ejercicio 7

Ahora vamos a personalizar la pantalla de bienvenida del servidor web Nginx. Para ello, arranca un servidor Nginx y conecta a él a través de un bash. Una vez dentro, vamos a usar el editor de texto de terminal llamado `nano` para editar el fichero ` /usr/share/nginx/html/index.html` para ello ejecuta:

1. `apt update`
1. `apt install -y nano`
1. `echo "hello" > /usr/share/nginx/html/index.html`
2. `nano /usr/share/nginx/html/index.html`
3. Edita el fichero, por ejemplo, puedes poner: `<h1>hello jose</h1>`
4. Sal del fichero pulsando `ctrl + x` y pulsa `Y` cuando te pregunte si quieres guardarlo y `enter` para guardarlo con el mismo nombre.
1. Comprueba que se muestra el msg refrescando el navegador.

## Ejercicio 8

Ahora vamos a guardar ese contenedor como imagen. Para ello, vamos a utilizar el comando `docker commit`.

1. Haz un `docker ps` para obtener el nombre de contenedor.
2. Ejecuta `docker commit <name> my_custom_nginx_image:1`
3. Lista las imagenes disponibles con `docker images` y comprueba que hay una que se llama `my_custom_nginx_image` con el tag `1`.
4. Ahora vamos a detener todos los contenedores en ejecución con `docker stop`. Además, vamos a eliminar los contenedores detenidos con el comando `docker rm`. La salida de `docker ps -a` debe ser vacia.
5. Finalmente, lanzamos un nuevo servidor web a partir de la imagen anterior lanzando `docker run -d -p 80:80 my_custom_nginx_image:1` 
6. Comprueba que efectivamente, el contenedor tiene el msg que has guardado previamente.

## Ejercicio 9

Ahora vamos a construir la misma imagen a partir de un Dockerfile. Un Dockerfile es un archivo de texto que contiene una serie de instrucciones para construir una imagen de Docker de manera automatizada y reproducible. Estas instrucciones definen el entorno, las dependencias y la configuración necesaria para la aplicación dentro del contenedor.

Crea un directorio con el nombre `custom_nginx` y muévete a él. Dentro, crea un fichero con el nombre `Dockerfile` y el siguiente contenido:

```Dockerfile
FROM nginx
RUN apt update &&\
    apt install -y nano

ADD index.html /usr/share/nginx/html/index.html
```

Ahora crea otro fichero con el nombre `index.html` con el siguiente contenido:

```html
<h1>versión1</h1>
```

Ahora ejecuta: `docker build -t my_nginx:v1 .`
Comprueba con `docker images` que tienes una imagen llamada `my_nginx:v1`. Ahora detén todos los contenedores y elimina todos los que no esten en corriendo. La salida `docker ps -a` debe ser vacia.

Y ejecuta el servidor web con:

`docker run -d -p 80:80 my_nginx:v1`

Comprueba la ruta: `http://localhost` que aparece el msg: `versión 1`.

## Ejercicio 10

Ahora inicia el sistema de control de versiones `git` en el directorio `custom_nginx`. Crea un repositorio remoto en `github` y sincroniza tus cambios locales con el remoto con un primer commit con el `msg: "Versión 1".`

Ahora modifica el fichero `index.html` para que muestre `Versión V2`.

Realiza un segundo commit al repositorio remoto en la rama main con el msg: `"versión 2"`.

Ahora ejecuta: `docker build -t my_nginx:v2 .`
Comprueba con `docker images` que tienes una imagen llamada `my_nginx:v1` y otra `my_nginx:v2`. Ahora detén todos los contenedores y elimina todos los que no esten en corriendo. La salida `docker ps -a` debe ser vacia.

Y ejecuta el servidor web con:

`docker run -d -p 80:80 my_nginx:v2`

Comprueba la ruta: `http://localhost` que aparece el msg: `versión 2`.

## RETO

> Si eres alumno de DAM presencial, muestra al profesor la configuración de este reto para convalidar con un 10 el parciar de Docker parte 1.

> Si eres alumno de DAM semipresencial, haz uso del enlace "entrega git parte1" para convalidar con un 10 la parte equivalente del cuestionario Docker.

Como has podido observar en los ejercicios 9 y 10, las tareas para generar nuevas versiones de nuestra imagen docker son repetitivas. Vamos a automatizar el proceso. Para ello abre un chat con `ChatGPT` e inserta el siguiente prompt:

```txt
Tengo un repositorio remoto en github con un fichero Dockerfile. Quiero que me muestre paso a paso como puedo automatizar la publicacion de esas imagenes en dockerhub haciendo uso de github actions. Muestra detalles de como crear y configurar la cuenta en docker hub y como obtener un token de acceso y como guardarlos de manera segura en github.  Muestra como crear un tag. Quiero que el trigger lo dispare cuando creo un tag sobre el repositorio. La imagen que suba a docker hub, tiene que tener como versión el contenido de ese tag. En el ejemplo, supongo que el tag es v3.
```

Realiza todos los pasos necesarios y genera una nueva versión en DockerHub. Ahora en tu máquina, ejecuta `docker run -d -p 80:80 <usuario>/<imagen>:<version>` para arancar un servicio web con todos los cambios que incluya la versión publicada.





