# Práctica UD3: Base de datos relacionales
Tiempo de realización 10h (4sesiones)

## Entrega
- **Fecha de entrega hasta el 5/02/2025 23:59**
- Se debe entregar **únicamente** la URL del repositorio en GitHub en la tarea habilitada en Aula Virtual(Moodle) en la sección "Convocatoria ordinaria". El usuario de Github jpaniorte debe tener permisos para clonar el repositorio.
- Esta práctica **REQUIERE defensa durante el exámen de la convocatoria del 7 al 14 Febrero 2025**:
    - Si lo deseas, y condicionado a que sea factible, puedes solicitar defender tu práctica antes del exámen. 
    - Debes acudir a defender la práctica en el día y hora que la escuela especifique.
    - La defensa durará entre 5 y 10 min, durante este tiempo, se deberá contestar a las preguntas formuladas por el profesor. Por ejemplo:
        - ¿Cómo se implementa una relación 1..N?
    - La defensa de la práctica no sube ni baja nota, simplemente valida y verifica que el alumno ha realizado la práctica y ha adquirido los conocimientos. Por lo tanto, la puntuación de la práctica será:
        - Si supera defensa => nota obtenida según *criterios de corrección*.
        - Si no supera la defensa => No Evaluable.

## Enunciado de la práctica

Debes inventar e implementar un proyecto Laravel original donde demostrar los contenidos adquiridos durante la unidad 3. 

El proyecto debe contener las siguientes secciones desarrolladas en el README.md de la raíz. Al ser un tipo de fichero Markdown, es recomendable leer esta guía para que el estilo y la visualización del texto sea correcta: https://tutorialmarkdown.com/sintaxis.

### 1. Descripción del problema (1,5p)

Debes inventar un supuesto lo más realista posible, es decir, algo que pienses que puedan pedir en la empresa donde trabajas o trabajarás, algo que un cliente te haya pedido, etc. Por ejemplo: 

*Supongamos que un cliente nos solicita implementar un sistema para gestionar las notas de los alumnos en diferentes asignaturas. Además, desea realizar el cálculo de las notas medias y % de aprobados por asignatura y alumno ...*

Criterio de corrección:
- :muscle: Sobrenatural:
    - Todos los criterios de Notable
    - El supuesto puede ser de utilidad para la escuela.
- Notable: 
    - Al menos el texto contiene 100 palabras.
    - Supuesto realista y original.
    - Se representa correctamente todas las tablas y relaciones entre ellas. Todos los atributos pueden ser inferidos con la información aportada.
- Bien:
    - Entre 50 y 100 palabras.
    - Supuesto poco realista.
    - 2 tablas o relaciones no representadas.
- Suspenso:
    - Menos de 50 palabras.
    - Supuesto no realista.
    - >2 tablas o relaciones no representadas.

### 2. Modelo E-R (1,5p)

Adjuntar una imagen del modelo E-R de vuestra aplicación. [Ver sintaxis en Markdown para renderizar imágenes](https://tutorialmarkdown.com/sintaxis#imagenes).

Criterio de corrección:

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Representa una relación ternaria.
    - Representa una relación de agregación.
- Notable:
    - Se representan todos los tipos de relaciones vistas en clase.
    - PK de cada tabla representado.
    - FK representadas con la cardenalidad (0..N, N..N)
- Bien:  
    - Faltan 2 relaciones de las vistas en clase.
    - Faltan 2 PK de cada tabla representado.
    - Faltan 2 FK representadas con la cardenalidad (0..N, N..N)
- Suspenso:
    - Faltan >2 relaciones de las vistas en clase.
    - Faltan >2 PK de cada tabla representado.
    - Faltan >2 FK representadas con la cardenalidad (0..N, N..N)

### 3. Implementación (6p)

Implementar el proyecto en Laravel.

Criterio de corrección:

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Existe en la raíz del proyecto un fichero de exportación de la aplicación [Postman](https://learning.postman.com/docs/getting-started/importing-and-exporting/exporting-data/) con un ejemplo de petición a todos los endpoints publicados.
    - Existe validación sobre los parámetros Request de entrada.
- Notable:
    - Todas las tablas creadas.
    - Todos lo modelos implementados.
    - Todas las tablas contienen datos de prueba mediante Seeders.
    - Todas las relaciones implementadas.
    - Existen almenos 10 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - Todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.
- Bien:  
    - Todas las tablas creadas.
    - Todos lo modelos implementados.
    - Todas las tablas contienen datos de prueba mediante Seeders.
    - Todas las relaciones implementadas.
    - Existen almenos 5 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - Todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.
- Suspenso:
    - No todas las tablas creadas.
    - No todos lo modelos implementados.
    - No todas las tablas contienen datos de prueba mediante Seeders.
    - No todas las relaciones implementadas.
    - No existen almenos 5 endpoints en el fichero `api.php` [Recordar configurar las API Routes](https://laravel.com/docs/11.x/routing#api-routes).
    - No todos los verbos del protocolo HTTP (GET, POST, PUT, DELETE) implementados.

### 4. WoW (1p)

El *Way of working* es una descripción detallada de los requisitos tecnológicos necesarios para trabajar en el proyecto y una serie de pasos concretos a ejecutar para tener la aplicación "lista" para trabajar.

- :muscle: Sobrenatural:
    - Todos los criterios de Notable.
    - Especifica cómo instalar todos los requisitos tecnológicos (PHP, Composer, etc).
- Notable:
    - Ejecutando todas las instrucciones en el orden proporcionado logramos "levantar" la aplicación.
- Bien:  
    - Falta 1 paso para "levantar" la aplicación.
- Suspenso:
    - Falta >1 paso para "levantar" la aplicación.