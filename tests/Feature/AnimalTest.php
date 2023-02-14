<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnimalTest extends TestCase
{

	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAnimal()
    {
        $response = $this->get('/api/v1/animals');
	    $response->assertStatus(200);

	    $response = $this->get('/api/v1/abracadabra');
	    $response->assertStatus(404);
    }

	public function testCreateAnimal()
	{
		$response = $this->post('/api/v1/animals',[]);
		$response->assertStatus(422);

		$response = $this->post('/api/v1/animals',['name' => 'bobik', 'shelter_id' => 1, 'race' => 'dog']);
		$response->assertStatus(201);

		$this->refreshDatabase();
	}

	public function testDeleteAnimal() {

		$response = $this->post('/api/v1/animals',['name' => 'bobik', 'shelter_id' => 1, 'race' => 'dog']);
		$response->assertStatus(201);

		$animalId = $this->getFirstAnimalId();

		$response = $this->delete('/api/v1/animals/' . $animalId);

		$response->assertStatus(204);

		$response = $this->delete('/api/v1/animals/' . $animalId);

		$response->assertStatus(404);
	}

	public function testSetAnimalAsAdaptable() {

		$this->refreshDatabase();

		$response = $this->post('/api/v1/animals',[
				'name' => 'sharik',
				'shelter_id' => 1,
				'race' => 'dog',
				'status' => 'pending']
		);

		$response->assertStatus(201);

		$animalId = $this->getFirstAnimalId();

		$response = $this->put('/api/v1/animals/' . $animalId . '/adaptable');

		$response->assertStatus(200);

		$this->refreshDatabase();
	}

	public function testGetAnimalsWithLimitAndOffset() {

		factory(Animal::class, 3)->create();

		$response = $this->get('/api/v1/animals');
		$content = json_decode($response->getContent(), true);

		$this->assertEquals(count($content['data']), 3);

		$response = $this->get('/api/v1/animals?limit=1');
		$content = json_decode($response->getContent(), true);

		$this->assertEquals(count($content['data']), 1);

		$response = $this->get('/api/v1/animals?offset=1');
		$content = json_decode($response->getContent(), true);

		$this->assertEquals(2, count($content['data']));

	}

	private function getFirstAnimalId() {

		$response = $this->get('/api/v1/animals?limit=1');
		$content = json_decode($response->getContent(), true);

		return $content['data'][0]['animal_id'];
	}
}
