<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CsvTest extends TestCase
{
    public function testIndex()
    {
        Storage::fake('local');

        Storage::put('file1.csv', 'header1,header2\nvalue1,value2');
        Storage::put('file2.csv', 'header1,header2\nvalue1,value2');
        Storage::put('valid.json', json_encode(['key' => 'value']));

        $response = $this->getJson('/api/csv');

        $response->assertStatus(200)
                 ->assertJson([
                     'mensaje' => 'Listado de ficheros',
                     'contenido' => ['file1.csv', 'file2.csv'],
                 ]);
    }

    public function testShow()
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

    public function testStore()
    {
        Storage::fake('local');

        $response = $this->postJson('/api/csv', [
            'filename' => 'file1.csv',
            'content' => 'Content 1',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'mensaje' => 'Guardado con éxito',
                 ]);

        Storage::disk('local')->assertExists('file1.csv');
        $this->assertEquals('Content 1', Storage::disk('local')->get('file1.csv'));
    }

    public function testUpdate()
    {
        Storage::fake('local');

        Storage::put('app/existingfile.csv', json_encode(['key' => 'value']));

        $data = [
            'filename' => 'existingfile.csv',
            'content' => json_encode(['new_key' => 'new_value'])
        ];

        $response = $this->put('/api/csv/existingfile.csv', $data);

        $response->assertStatus(200)
                 ->assertJson(['mensaje' => 'Fichero actualizado exitosamente']);

        Storage::assertExists('app/existingfile.csv');
        $this->assertEquals(json_encode(['new_key' => 'new_value']), Storage::get('app/existingfile.csv'));
    }

    public function testDestroy() {
        Storage::fake('local');

        Storage::put('app/existingfile.csv', json_encode(['key' => 'value']));

        $response = $this->delete('/api/csv/existingfile.csv');

        $response->assertStatus(200)
                    ->assertJson(['mensaje' => 'Fichero eliminado exitosamente']);

        Storage::assertMissing('app/existingfile.csv');
    }
}
