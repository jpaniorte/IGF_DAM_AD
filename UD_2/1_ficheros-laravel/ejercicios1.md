## Reto

Crea un repositorio en GitHub con el nombre `ficheros-laravel`. Haz el repositorio privado y asegurate de que el usuario `jpaniorte` tenga permisos de lectura/escritura.

Para superar el reto, nuestra aplicación debe superar las siguientes pruebas. Cada prueba supone 1,25p.

#### Prueba 1

```bash
curl -O "http://localhost:8000/api/json/hello?name=jose"
```
=> descarga un fichero con el nombre: jose.json con el contenido:

```json
{
    "message": "hello jose"
}
```

#### Prueba 2

```bash
curl -O "http://localhost:8000/api/json/hello?name=jose"
```
=> hay un fichero en la carpeta `storage/app/json/jose.json` con el contenido:
```json
{
    "message": "hello jose"
}
```

#### Prueba 3

```bash
curl -O "http://localhost:8000/api/json/hello?name=holaSoyJose"
```

=> descarga un fichero con el nombre: holaSoyJose.json

```json
{
    "message": "hello holaSoyJose"
}
```

#### Prueba 4

```bash
curl -O "http://localhost:8000/api/json/hello?name=holaSoyJose"
```

=> hay un fichero en la carpeta `storage/app/json/holaSoyJose.json` con el contenido:

```json
{
    "message": "hello holaSoyJose"
}
```

#### Prueba 5

```bash
curl -O "http://localhost:8000/api/xml/hello?name=jose"
```

=> Descarga un fichero en la carpeta `storage/app/xml/jose.xml` con el contenido:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<messages>
    <message>hello jose</message>
</messages>
```

#### Prueba 6

```bash
curl -O "http://localhost:8000/api/xml/hello?name=jose"
```

=> hay un fichero en la carpeta `storage/app/xml/jose.xml` con el contenido:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<messages>
    <message>hello jose</message>
</messages>
```

#### Prueba 7

```bash
curl -O "http://localhost:8000/api/csv/hello?name=jose"
```

=> Descarga un fichero en la carpeta `storage/app/csv/jose.xml` con el contenido:

```xml
message
hello John
```

#### Prueba 8

```bash
curl -O "http://localhost:8000/api/csv/hello?name=jose"
```

=> Hay un fichero en la carpeta `storage/app/csv/jose.xml` con el contenido:

```xml
message
hello John
```

### Automatización de pruebas

Añade los siguientes ficheros a tu repositorio para que con cada commit a master, se ejecuten una bateria de pruebas automáticas en tu aplicación.

### Entrega

Enlace a la salida de github actions con más puntuación a través del aula virtual.