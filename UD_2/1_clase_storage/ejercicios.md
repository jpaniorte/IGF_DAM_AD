# Ejercicios UD2 - Clase Storage

## Preparación del ejercicio

Para realizar estos ejercicios, debes seguir estos pasos:

1. Revisa la diapositiva 7 de "UD2_presentacion_evaluacion.pdf", lo puedes encontrar [aqui](../UD2_presentacion_evaluacion.pdf) y asegúrate de tener tu entorno configurado.
2. Haz un fork del siguiente [repositorio](https://github.com/jpaniorte/ud2-storage-pub).
3. Clona el fork del repositorio y abre el proyecto con tu IDE.
4. En la terminal, sitúate en la carpeta del proyecto y ejecuta lo siguiente:

```bash
composer install -n --prefer-dist
cp .env.ci .env
php artisan key:generate
```
5. Comprueba que no pasas ningún test ejecutando:

```bash
php artisan test
```

# Ejercicio 1 (1p)

Abre el fichero `app/Http/Controllers/HelloWorldController.php` y lee el comentario de la función index. Modifica dicha función de manera que superes el testIndex asociado. Para ejecutar únicamente dicho test, lanza:

```bash
php artisan test --filter HelloWorldControllerTest::testIndex
```

# Ejercicio 2 (1p)

Abre el fichero `app/Http/Controllers/HelloWorldController.php` y lee el comentario de la función store. Modifica dicha función de manera que superes el testStore asociado. Para ejecutar únicamente dicho test, lanza:

```bash
php artisan test --filter HelloWorldControllerTest::testStore
```

# Ejercicio 3 (8p)

Realiza las acciones necesarias para que al ejecutar `php artisan test` obtengas la siguiente salida:

```bash
   PASS  Tests\Feature\HelloWorldControllerTest
  ✓ index                                                                                                                                                                                                                      0.05s
  ✓ store                                                                                                                                                                                                                      0.01s
  ✓ store file already exists
  ✓ show
  ✓ show file not found
  ✓ update
  ✓ update file not found
  ✓ destroy
  ✓ destroy file not found

  Tests:    9 passed (23 assertions)
  Duration: 0.11s
```

# Entrega

Abre una Pull Request a la rama main y, a través del aula virtual, entrega la URL de dicha PL. La corrección será automática y la nota será proporcional a la cantidad de tests superados, por lo que es recomendable comprobar que la salida del job test de la PL supera todo los test.