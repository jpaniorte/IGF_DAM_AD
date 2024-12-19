# Ejercicios UD3.2 - Modelos
Tiempo de realización 5h (2sesiones)

**Entrega**: Se debe entregar **únicamente** la URL de proyecto de GitHub mediante el Moodle de la escuela (igformacion.online) en la tarea asociada  **antes de finalizar el plazo de entrega**. Si corresponde, responde a las preguntas en el README.md de la raíz del proyecto.

> Nota: puedes necesitar los ejercicios de 3.1 para continuar con este apartado. Todos los ejercicios se deben implementar sobre el proyecto `ud3_ejercicios`.

## Ejercicio 1 (1.5p)

A partir de la base de datos `gestion_notas` del ejercicio 10 de los ejercicios 3.1; y usando el mismo proyecto de Laravel, crea el modelo Alumno, Nota y Asignatura asociados a las tablas Alumnos, Notas y Asignaturas. [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).

## Ejercicio 2 (1.5p)

Implementa las operaciones Crear, Leer, Actualizar y Borrar (CRUD en inglés) mediante los siguientes endpoints. Debes usar una instancia del modelo para crear el registro.

GET /api/alumnos -> devuelve todos los alumnos
GET /api/alumnos/*id* -> devuelve el alumno *id*
POST /api/alumnos -> crea un nuevo alumno
PUT /api/alumnos/*id* -> actualiza el alumno *id*
DELETE /api/alumnos/*id* -> borra el alumno *id*

## Ejercicio 3 (1.5p)

Implementa las operaciones Crear, Leer, Actualizar y Borrar (CRUD en inglés) mediante los siguientes endpoints. Debes usar el método create() para la creación de un registro.

GET /api/notas -> devuelve todos los notas
GET /api/notas/*id* -> devuelve el alumno *id*
POST /api/notas -> crea un nuevo alumno
PUT /api/notas/*id* -> actualiza el alumno *id*
DELETE /api/notas/*id* -> borra el alumno *id*

## Ejercicio 4 (1.5p)

Implementa las operaciones Crear, Leer, Actualizar y Borrar (CRUD en inglés) mediante los siguientes endpoints. Debes usar el método create() para la creación de un registro.

GET /api/notas -> devuelve todos los notas
GET /api/notas/*id* -> devuelve el alumno *id*
POST /api/notas -> crea un nuevo alumno
PUT /api/notas/*id* -> actualiza el alumno *id*
DELETE /api/notas/*id* -> borra el alumno *id*

## Material complementario para el ejercicio 5

Postman es una herramienta popular para desarrollar, probar y documentar APIs (Interfaces de Programación de Aplicaciones). Es ampliamente utilizada por desarrolladores debido a su interfaz intuitiva, que permite realizar solicitudes HTTP fácilmente, analizar respuestas y colaborar en proyectos.

### Cómo empezar con Postman
1. Descarga Postman desde https://www.postman.com/downloads/.
2. Crear tu primera solicitud:
- Abre Postman y selecciona New Request.
- Introduce la URL:PORT del endpoint y selecciona el método HTTP.
- Agrega parámetros, encabezados o datos si es necesario.
- Haz clic en Send para ejecutar la solicitud.
3. Analizar la respuesta:
- Inspecciona el código de estado (200, 404, 500, etc.).
- Ve el cuerpo de la respuesta en formatos como JSON o XML.
- Revisa encabezados de respuesta y tiempo de ejecución.
4. Guarda la solicitud en una colección para reutilizarla más tarde.

### Ejemplo práctico
Supongamos que tienes un endpoint para consultar usuarios:

GET https://jsonplaceholder.typicode.com/users

1. Abre Postman y selecciona el método GET.
2. Introduce la URL en el campo de la solicitud.
3. Haz clic en Send.
4. Analiza la respuesta JSON con datos de usuarios.
5. Guarda la consulta como TEST USERS POSTMAN
6. Exporta las consultas en un fichero json: https://learning.postman.com/docs/getting-started/importing-and-exporting/exporting-data/

## Ejercicio 5 (2p)

Implementa todas las peticiones implementadas en los ejercicios 2,3 y 4 y comprueba que funcionan correctamente. Exporta el fichero a la raíz del proyecto.

## Ejercicio 6 (2p)

Crea un apartado en el README.md llamado "Way of working" con una descripción detallada de los requisitos tecnológicos necesarios para trabajar en el proyecto y una serie de pasos concretos a ejecutar para tener la aplicación "lista" para trabajar.
