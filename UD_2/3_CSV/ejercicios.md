# Ejercicios UD2 - CSV

## Preparación del ejercicio

Estos ejercicios se realizan sobre el mismo repositorio de GitHub de los ejercicios "UD 2 - Clase Storage". Simplemente hay que comprobar antes de comenzar:

- Cierra la Pull Request que tengas abierta.
- Comprueba que tienes todos los tests en verde


## Ejercicio 1 (3p)

1. Crea una batería de test feature con el nombre `CsvTest`. Haz uso del comando `php artisan make:test` para crearlo.

2. En el fichero CsvTest.php, implementa los tests para los métodos index, store, update, delete. **No uses ChatGPT**, los tests de estos 4 métodos son idénticos a los vistos en los ficheros `JsonTest.php` y `HelloWorldControllerTest.php`.

3. Añade a ese fichero el siguiente test correspondiente al método show:

```php
public function test_show_returns_file_content()
{
    Storage::fake('local');

    Storage::put('app/existingfile.csv', 'header1,header2\nvalue1,value2');

    $response = $this->get('/api/csv/existingfile.csv');

    $response->assertStatus(200)
                ->assertJson([
                    'mensaje' => 'Fichero leído con éxito',
                    'contenido' => [
                        ['header1' => 'value1', 'header2' => 'value2']
                    ]
                ]);
}
```


## Ejercicio 2 (7p)

1. Copia el fichero `materiales/CsvController.php` en la carpeta `app/Http/Controllers`.

2. Implementa los métodos index, store, show, update y destroy de acuerdo con la especificación de los comentarios hasta que todos los test sean superados:

```bash
php artisan test
```

# Entrega

Abre una Pull Request a la rama main y, a través del aula virtual, entrega la URL de dicha PL. La corrección será automática y la nota será proporcional a la cantidad de tests superados, por lo que es recomendable comprobar que la salida del job test de la PL supera todo los test.