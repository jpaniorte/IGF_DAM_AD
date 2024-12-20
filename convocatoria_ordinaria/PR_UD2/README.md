# [CONVOCATORIA ORDINARIA] 
# Práctica UD 2

## Entrega

- **Fecha de entrega hasta el 18/02/2025 23:59**
- Se debe entregar **únicamente** la URL del repositorio en GitHub en la tarea habilitada en Aula Virtual(Moodle) en la sección "Convocatoria ordinaria"
- Esta práctica **REQUIERE defensa durante el exámen de la convocatoria ordinaria**:
    - Debes acudir a defender la práctica en el día y hora que la escuela especifique.
    - La defensa durará entre 5 y 10 min, durante este tiempo, se deberá contestar a las preguntas formuladas por el profesor. Por ejemplo:
        - Si lanzo el el servidor en el puerto 8007, ¿Qué cambios debes realizar en tu práctica para que consuma el servicio expuesto en ese puerto?
    - La defensa de la práctica no sube ni baja nota, simplemente valida y verifica que el alumno ha realizado la práctica y ha adquirido los conocimientos. Por lo tanto, la puntuación de la práctica será:
        - Si supera defensa => nota obtenida según *criterios de corrección*.
        - Si no supera la defensa => No Evaluable.


## Criterios de corrección

- [OBLIGATORIO] 
    1. Se debe estructurar el proyecto de la siguiente manera:
        - 1 único repositorio para el frontend y el backend. 
        - En la raíz del proyecto debe aparecer *únicamente*:
            - Una carpeta `frontend` con el código del cliente.
            - Una carpeta `backend` con el código del backend.
            - Un fichero README.md.
    2. El fichero README.md se debe estructura de la siguiente manera:
        - Breve descripción del proyecto
        - Frameworks/Tecnologías empleadas.
        - How to:
            - Descripción de tecnologias y versiones mínimas necesarias.
            - Secuencia de pasos necesarios para levantar un entorno de desarrollo con frontend y backend activos.

- 8 puntos = 0,4p por cada ruta implementada.
    - Se considera ruta implementada sí desde el cliente se realiza una petición a la API, esta devuelve respuesta y el cliente "pinta" la respuesta correctamente.
- 2 puntos = puedo levantar un entorno de desarrollo local ejecutando:
    - `git clone <url repo>`
    - `docker compose up -d`

## Descripción del práctica

La práctica consiste en implementar un cliente que permita consumir la API REST que estamos definiendo durante los ejercicios. **La tecnología y el diseño de este cliente es libre elección**. Las rutas o endopints que deben ser implementados son:

-  Los definidos en los ejercicios *2.1 Clase Storage*
    - GET /api/hello
    - GET /api/hello/{filename}
    - POST /api/hello
    - PUT /api/hello/{filename}
    - DELETE /api/hello/{filename}
-  Los definidos en los ejercicios *2.2 JSON*
    - GET /api/json
    - GET /api/json/{filename}
    - POST /api/json
    - PUT /api/json/{filename}
    - DELETE /api/json/{filename}
-  Los definidos en los ejercicios *2.3 CSV*
    - GET /api/csv
    - GET /api/csv/{filename}
    - POST /api/csv
    - PUT /api/csv/{filename}
    - DELETE /api/csv/{filename}

### Conocimientos que debe adquirir el alumno durante el desarrollo de la práctica
- Cómo realizar una petición HTTP.
- Cómo manejar la respuesta HTTP.
- Códigos HTTP más empleados (200, 2001, 404, ...)
- Importancia de los Headers en las peticiones HTTP:
    - CORS
    - Content-type
    - Accept


