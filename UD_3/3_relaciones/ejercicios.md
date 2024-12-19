# Ejercicios UD3.2 - Modelos
Tiempo de realización 5h (2sesiones)

> Nota: puedes necesitar los ejercicios de 3.1 para continuar con este apartado. Todos los ejercicios se deben implementar sobre el proyecto `ud3_ejercicios`.

## Ejercicio 1

Crea la relación N:N que se observa en el diagrama E-R del ejercicio 10 de los ejercicios UD3.1.

## Ejercicio 2 

Implementa la relación, modelo y tablas especificadas en el siguiente E-R:

```bash
+-------------------+              +-------------------+
|    Alumno         |              |    Perfil         |
|-------------------|              |-------------------|
| id (PK)           |<-1.1-----1.1-| id (PK)           |
| nombre            |              | usuario_id (FK)   |
| email             |              | biografia         |
+-------------------+              +-------------------+    
                               
```

## Ejercicio 3

Implementa la relación, modelo y tablas especificadas en el siguiente E-R:

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
