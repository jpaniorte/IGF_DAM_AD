# Práctica UD 1

> El siguiente enunciado esta en continua mejora. Antes de realizar la entrega, revisa la última publicación de la misma.

## Ejercicio 1: Perfil profesional
Entra en el portal de empleo `mandfred` y muestra todas las ofertas (Activas e inactivas). Puedes acceder directamente a través del siguiente enlace: https://www.getmanfred.com/ofertas-empleo?onlyActive=false&currency=%E2%82%AC

Encuentra 2 ofertas que sean de tu interés, es decir:

- Cerca de tu localidad o remoto. 
- Que el salario y condiciones cumpla con tus expectativas. 
- Que el proyecto te motive.

Ahora anota cada una de las cosas que piden en formato JSON. Verás que las dividen en dos partes: Cosas imprescindibles y cosas opcionales (estas últimas suelen ponerlas como "Te marcarías un triple si además..."). Estas cosas opcionales decantan la balanza hacia una candidata u otra, si ambas cumplen "los musts".

Por ejemplo, para la siguiente oferta: https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24 deberás crear algo como:

```python
{
    "oferta": "https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24"
    "must": [
        {
            "name": "Experiencia trabajando con Java, últimas versiones (v.17-21)",
        },
        {
            "name": "Destrezas implementando microservicios con Spring."
        },
        {
            "name": "Haber trabajado con Kafka para el manejo de eventos."
        },
        {
            "name": "Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos."
        },
        {
            "name": "Poderte comunicar en Inglés con facilidad y sin bloqueos."
        }
    ],
    "should_be": [
        {
            "name": "Conocimientos en Infraestructura como código usando Terraform o Ansible."
        },
        {
            "name": "Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo."
        },
        {
            "name": "Tienes conocimientos de Kubernetes."
        }
    ]
}
```
Ahora para cada must y should_be, vamos a clasificar cada item en estos grupos: Experiencia, Arquitectura, Tecnologías, Habilidad_personal. Por ejemplo:

```python
{
    "oferta": "https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24"
    "must": [
        {
            "name": "Experiencia trabajando con Java, últimas versiones (v.17-21)",
            "category": "Experiencia"
        },
        {
            "name": "Destrezas implementando microservicios con Spring.",
            "category": "Arquitectura"
        },
        {
            "name": "Haber trabajado con Kafka para el manejo de eventos.",
            "category": "Tecnología"
        },
        {
            "name": "Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos.",
            "category": "Arquitectura"
        },
        {
            "name": "Poderte comunicar en Inglés con facilidad y sin bloqueos.",
            "category": "Habilidad_personal"
        }
    ],
    "should_be": [
        {
            "name": "Conocimientos en Infraestructura como código usando Terraform o Ansible."
            "category": "Tecnología"
        },
        {
            "name": "Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo.",
            "category": "Tecnología"
        },
        {
            "name": "Tienes conocimientos de Kubernetes.",
            "category": "Tecnología"
        }
    ]
}
```

Ahora, para cada oferta, vamos a establecer una fecha en la que pensamos que podemos lograr ese objetivo. Para lograrlo, vamos a establecer una serie de items cuantificables y un tiempo que tardariamos en cada uno de ellos. 

### Ejemplo de reflexión para calcular una "fecha de loggro" para cada uno de los items de la cateogria Experiencia:

> Ejemplo: **Experiencia trabajando con Java, últimas versiones (v.17-21)**

Cuando piden experiencia, quieren saber los proyectos en los que has trabajado. Lo que tienes que hacer es: 
- Inventarte un proyecto personal, por ejemplo: 
    - proyecto de CRM para una empresa X: supongamos que la fruteria del barrio o el comercio de un familiar quiere informatizar su inventario de productos. Diseña un backend con java 21.
- Proyectos open source: en java hay muchos, busca algunos de tu interés y contribuye!
    - por ejemplo: https://github.com/cBioPortal/cbioportal

Ahora establece unos objetivos medibles y una fecha de finalización. Por ejemplo:

- 10 PR aprobadas en proyectos open source: 3 meses
- 20 forks de proyectos java interesantes: 1 mes
- Logar 10 estrellas en mi proyecto personal. 1 año.
- Lograr 5 forks en mi proyecto personal. 1 año.
- +100 commits en mi proyecto personal.
- +3 versiones en mi proyecto personal.

Ahora, pasa esos items al JSON:

```python
{
    "name": "Experiencia trabajando con Java, últimas versiones (v.17-21)",
    "category": "Experiencia",
    "items": [
        {
            "name": "10 PR en proyectos open source",
            "init": 0, # desde donde parto
            "now": 0, # la cantidad que llevas hasta ahora
            "target": 10 # donde quiero llegar
        },
        {
            "name": "20 forks de proyectos java interesantes",
            "init": 0,
            "now": 5,
            "target": 20
        }
    ]
},
```

### Ejemplo de reflexión para calcular una "fecha de logro" para cada uno de los items de la cateogria Arquitectura:

> Ejemplo: **Destrezas implementando microservicios con Spring.**

> Ejemplo: **Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos**

> Ejemplo: **Clean Code, principios SOLID, integración continua**

Cuando piden Arquitectura, te van a preguntar por tus conocimientos técnicos. La mejor manera de demostrar que tienes conocimiento en esa área es buscar libros o cursos de autores de referencia. Por ejemplo:

- Microservicios: https://amzn.eu/d/1m6Em7X 3 meses
- Clean Code: https://amzn.eu/d/4vv52Er 4 meses

Por lo tanto, hay que buscar bibliografía o buscar cursos sobre ese conocimiento. Cuando lo tengas, anota el tiempo que te puede llevar en realizar ese curso o leer ese libro y pasa los datos al JSON:

```python
{
    "name": "Destrezas implementando microservicios con Spring.",
    "category": "Arquitectura",
    "items": [
        "name": "Leer libro Microservices Patterns",
        "init": 0, # desde donde parto en %
        "now": 0, # la cantidad que llevas hasta ahora en %
        "target": 100 # donde quiero llegar en %
    ]
},
```
### Ejemplo de reflexión para cada uno de los items en la categoría Tecnología:

Cuando piden algo de Tecnología, quieren saber si te has peleado con dicha tecnología y la mejora manera de demostrar ese conocimiento es anotar cuantos problemas has conseguido solucionar con esa tecnologia. Por ejemplo, si piden git:

- Problemas con LF y CRLF trabajando con windows y linux
- Me tiré 3 meses con una rama feature abierta y no logré mergearla a master de la cantidad de conflictos que salieron.

Ahora, para el ejemplo de la oferta: **Haber trabajado con Kafka para el manejo de eventos.**

Lo primero que tenemos que hacer, es instalar Kafka y usarlo en nuestro proyecto personal. Ahora anotamos la cantidad de problemas que hemos tenido. Y pasamos esa info al JSON:

```python
{
    "name": "Haber trabajado con Kafka para el manejo de eventos",
    "category": "Tecnologia",
    "items": [
        "problem": "No habia manera de publicar un topic con NodeJS",
        "solution": "Resulta que habia un bug en la versión 11.x y me tocó subir a la versión 12.x"
    ]
},
```

En esta categoría no hay forma de anticipar cuánto tardarás en encontrar un problema. Cuantas más horas dediques, más problemas (y más interesantes) encontrarás.

### Ejemplo de reflexión para cada uno de los items en la categoría Habilidad Personal:

Suele ser inglés, trabajar en equipo, proactividad... y esta parte depende exclusivamente de tí.

### Ejemplo de entrega ejercicio 1

Finalmente, has de tener una estructura JSON así:

```python
{
    [
        {
            "oferta": "https://www.getmanfred.com/ofertas-empleo/5071/sngular-senior-java-developer-oct24"
            "must": [
                {
                    "name": "Experiencia trabajando con Java, últimas versiones (v.17-21)",
                    "category": "Experiencia",
                    "items": [
                        {
                            "name": "10 PR en proyectos open source",
                            "init": 0, # desde donde parto
                            "now": 0, # la cantidad que llevas hasta ahora
                            "target": 10 # donde quiero llegar
                        },
                        {
                            "name": "20 forks de proyectos java interesantes",
                            "init": 0,
                            "now": 5,
                            "target": 20
                        }
                    ]
                },
                {
                    "name": "Destrezas implementando microservicios con Spring.",
                    "category": "Arquitectura",
                    "items": [
                        "name": "Leer libro Microservices Patterns",
                        "init": 0, # desde donde parto en %
                        "now": 0, # la cantidad que llevas hasta ahora en %
                        "target": 100 # donde quiero llegar en %
                    ]
                },
                {
                    "name": "Haber trabajado con Kafka para el manejo de eventos.",
                    "category": "Tecnología",
                    "items": [
                        "problem": "No habia manera de publicar un topic con NodeJS",
                        "solution": "Resulta que habia un bug en la versión 11.x y me tocó subir a la versión 12.x"
                    ]
                },
                {
                    "name": "Experiencia en Arquitectura Hexagonal Arquitectura basada en Eventos.",
                    "category": "Arquitectura",
                    "items": [
                        "name": "Leer libro Microservices Hexagonal Patterns",
                        "init": 0, # desde donde parto en %
                        "now": 0, # la cantidad que llevas hasta ahora en %
                        "target": 100 # donde quiero llegar en %
                    ]
                },
                {
                    "name": "Poderte comunicar en Inglés con facilidad y sin bloqueos.",
                    "category": "Habilidad_personal"
                }
            ],
            "should_be": [
                {
                    "name": "Conocimientos en Infraestructura como código usando Terraform o Ansible."
                    "category": "Tecnología",
                    "items": []
                },
                {
                    "name": "Sabes desplegar desde algún servicio de cloud, ellos trabajan con Azure, sobre todo.",
                    "category": "Tecnología",
                    "items": []
                },
                {
                    "name": "Tienes conocimientos de Kubernetes.",
                    "category": "Tecnología",
                    "items": []
                }
            ]
        },
        {
            "oferta": "segunda oferta"
            "must": [],
            "should_be": []
        }
    ]
    
}
```

## Ejercicio 2

Realiza el reto de Docker - Parte 1: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/docker/ejercicios1.md#reto

## Ejercicio 3

Realiza el reto de Docker - Parte 2: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/docker/ejercicios1.md#reto

## Ejercicio 4

Realiza el reto de Docker - Parte 3: https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/docker/ejercicios1.md#reto

## Ejercicio 5
to be defined

## Ejercicio 6
to be defined

## Ejercicio 7
to be defined