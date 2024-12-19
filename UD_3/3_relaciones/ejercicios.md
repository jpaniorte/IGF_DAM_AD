# Ejercicios UD3.3 - Modelos
Tiempo de realización 5h (2sesiones)

**Entrega**: Se debe entregar **únicamente** la URL de proyecto de GitHub mediante el Moodle de la escuela (igformacion.online) en la tarea asociada  **antes de finalizar el plazo de entrega**. Si corresponde, responde a las preguntas en el README.md de la raíz del proyecto.

> Nota: puedes necesitar los ejercicios de 3.1 para continuar con este apartado. Todos los ejercicios se deben implementar sobre el proyecto `ud3_ejercicios`.

## Ejercicio 1 (4p)

Crea la relación N:N que se observa en el diagrama E-R del ejercicio 10 de los ejercicios UD3.1.

## Ejercicio 2 (3p)

Implementa la relación, modelo y tablas necesarias para cumplir con el siguiente E-R:

```bash
+-------------------+              +-------------------+
|    Alumno         |              |    Perfil         |
|-------------------|              |-------------------|
| id (PK)           |<-1.1-----1.1-| id (PK)           |
| nombre            |              | usuario_id (FK)   |
| email             |              | biografia         |
+-------------------+              +-------------------+    
                               
```

## Ejercicio 3 (3p)

Implementa la relación, modelo y tablas necesarias para cumplir con el siguiente E-R:

```bash
+-------------------+                  +-------------------+
|    Alumno         |                  |      Post         |
|-------------------|                  |-------------------|
| id (PK)           |<-1..N-------1.1--| id (PK)           |
| nombre            |                  | usuario_id (FK)   |
| email             |                  | titulo            |
+-------------------+                  | contenido         |
                                       +-------------------+  
```
