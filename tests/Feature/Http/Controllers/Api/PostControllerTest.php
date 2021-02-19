<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
	use RefreshDatabase;
	public function test_store()
	{
		$response = $this->json('POST','/api/posts',[
			'title' => 'El post de prueba'
		]);

		$response->assertJsonStructure([
			'id', 'title', 'created_at', 'updated_at'
		])->assertJson(['title' => 'el post de prueba'])
		->assertStatus(201); //Ok, Created

		$this->assertDatabaseHas('posts', ['title' => 'el post de prueba']);
	}
}
