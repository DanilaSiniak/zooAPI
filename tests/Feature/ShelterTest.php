<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShelterTest extends TestCase
{

	use RefreshDatabase;

	public function testCreateShelter()
	{
		$response = $this->post('/api/v1/shelters',[]);
		$response->assertStatus(422);

		$response = $this->post('/api/v1/shelters',['name' => 'shelter 1']);
		$response->assertStatus(422);

		$response = $this->post('/api/v1/shelters',['name' => 'shelter 1', 'address' => ' test address']);
		$response->assertStatus(201);

	}

	public function testDeleteShelter() {

		$response = $this->post('/api/v1/shelters',['name' => 'shelter 2', 'address' => 'sdfsdfs sdf sdf']);
		$response->assertStatus(201);

		$response = $this->get('/api/v1/shelters?limit=1');

		$content = json_decode($response->getContent(), true);

		$shelterId = $content['data'][0]['shelter_id'];

		$response = $this->delete('/api/v1/shelters/' . $shelterId);

		$response->assertStatus(204);

		$response = $this->delete('/api/v1/shelters/' . $shelterId);

		$response->assertStatus(404);
	}
}
