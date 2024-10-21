# Práctica UD 1

2. [Entrega](#entrega)
1. [Ejercicios](#ejercicios)

# Entrega

Entrega un documento editable (por ejemplo, Word) con todos los ejercicios resueltos.

# Ejercicios
## Ejercicio 1: Perfil profesional

El proposito de este ejercicio es elaborar vuestro perfil profesional. Para ello, analizaremos los requisitos de dos ofertas de trabajo y estableceremos una hoja de ruta que nos ayudará a lograrlos.

En primer lugar, vamos a seleccionar dos ofertas de trabajo. Para ello, entra en el portal de empleo `mandfred` y muestra todas las ofertas (Activas e inactivas). Puedes acceder directamente a través del siguiente enlace: https://www.getmanfred.com/ofertas-empleo?onlyActive=false&currency=%E2%82%AC

Encuentra 2 ofertas que sean de tu interés, es decir:

- Cerca de tu localidad o remoto. 
- Que el salario y condiciones cumpla con tus expectativas. 
- Que el proyecto te motive.

Ahora anota cada uno de los requisitos. Verás que estos se clasifican en dos tipos: imprescindibles y opcionales. En general, cuando hay más de 1 candidato que supera los requisitos imprescindibles, los  opcionales decantan la balanza hacia una candidata u otra.

Por ejemplo, para la siguiente [oferta](https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24), deberás tener algo como:

```
Oferta: https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24
Requisitos:
    - Experiencia trabajando con Java, últimas versiones (v.17-21).
    - Destrezas implementando microservicios con Spring.
    - Haber trabajado con Kafka para el manejo de eventos.
    - Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos.
    - Poderte comunicar en Inglés con facilidad y sin bloqueos.
Extra:
    - Conocimientos en Infraestructura como código usando Terraform o Ansible.
    - Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo.
    - Tienes conocimientos de Kubernetes.
```

Para analizar cada uno de estos requisitos, tenemos que establecer una clasificación de cada uno de ellos. A continuación se muestran las 4 categorías más frequentes:

**Experiencia**

No se trata tanto de la cantidad de años que has trabajado en un rol concreto, sino en que proyectos concretos has trabajado. Para abordar este tipo de requisito, tienes que: 
- Inventarte un proyecto personal: 
- Contribuir a un proyectos open source

**Arquitectura**

Este tipo de requisito esta orientado a evaluar tus conocimientos técnicos sobre alguna materia. La mejor manera de demostrar que tienes conocimiento en esa área es buscar libros o cursos de autores de referencia. Por ejemplo:

- Microservicios
- Clean Code
- Principios SOLID
- DDD
- TDD
- Arquitectura Hexagonal
- Pruebas de caja negra, caja blanca, unitarios, integración. Testing.
- Event Sourcing

**Tecnología**

A diferencia de Arquitectura, una tecnología es algo que puedo instalar, configurar y utilizar en mi software. Por lo tanto, para superar este tipo de requisito, es necesario instalar, configurar y utilizar dicha tecnología. En concreto, es importante conocer cuantos problemas, retos o hitos has superado. Por ejemplo:

- Diseñe una aplicación Java con el patrón Event Sourcing (Arquitectura) usando Kafka (Tecnología).
- En el CRM que diseñé para el proyecto final de módulo, usé Docker para cada microservicio y GitHub Actions para publicar las imágenes en Docker Hub. 
- En el proyecto final de módulo, usé Ansible y Terraform para configurar las intancias EC2 de AWS.

**Habilidad personal**

Suele ser: inglés, trabajar en equipo, proactividad... y esta parte depende exclusivamente de tí.


Continuamos con el ejercicio! Ahora clasifica los requisitos anteriores haciendo uso de las categorias anteriores, por ejemplo:

```
Oferta: https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24
Requisitos:
    - Experiencia trabajando con Java, últimas versiones (v.17-21). (Experiencia)
    - Destrezas implementando microservicios con Spring. (Arquitectura)
    - Haber trabajado con Kafka para el manejo de eventos. (Tecnología)
    - Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos. (Arquitectura)
    - Poderte comunicar en Inglés con facilidad y sin bloqueos. (Habilidad Personal)
Extra:
    - Conocimientos en Infraestructura como código usando Terraform o Ansible. (Tecnología)
    - Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo. (Tecnología).
    - Tienes conocimientos de Kubernetes. (Tecnología).
```

Y para cada uno de los requisitos, establece una série de objetivos cuantificables, por ejemplo:

- MAL => leer un libro sobre Clean code
- BIEN => leer el libro "Clean Code: A Handbook of Agile Software Craftsmanship" (Robert C. Martin Series)

Finalmente, debes generar un documento **WORD** con el siguiente contenido:

```
Oferta: https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24
Requisitos:
    - Experiencia trabajando con Java, últimas versiones (v.17-21). (Experiencia)
        - 5 MR aprobadas en 2 proyectos open source diferentes.
        - 20 forks de proyectos Java interesantes en mi perfil de GitHub.
    - Destrezas implementando microservicios con Spring. (Arquitectura)
        - <Objetivos medibles>
    - Haber trabajado con Kafka para el manejo de eventos. (Tecnología)
        - <Objetivo medible>
    - Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos. (Arquitectura)
        - <Objetivo medible>
    - Poderte comunicar en Inglés con facilidad y sin bloqueos. (Habilidad Personal)
        -<Objetivo medible>
Extra:
    - Conocimientos en Infraestructura como código usando Terraform o Ansible. (Tecnología)
        - <Objetivo medible>
    - Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo. (Tecnología).
        - <Objetivo medible>
    - Tienes conocimientos de Kubernetes. (Tecnología).
        - <Objetivo medible>
---

Oferta: <url>
Requisitos:
    - <requisitos>(clasificación)
        - <objetivos medibles>
Extra:
    - <requisitos>(clasificación)
        - <objetivos medibles>
```

## Ejercicio 2
Realiza el reto de Docker - Parte 1: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/2_docker/ejercicios1.md#reto

## Ejercicio 3
Realiza el reto de Docker - Parte 2: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/2_docker/ejercicios1.md#reto

## Ejercicio 4
Realiza el reto de Docker - Parte 3: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/2_docker/ejercicios1.md#reto

## Ejercicio 5
Realiza el reto Laravel - Parte 1

## Ejercicio 6
Realiza el reto Laravel - Parte 2

## Ejercicio 7
Realiza el reto Persistencia de los datos
