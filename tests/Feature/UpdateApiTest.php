<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */
    public function updateUser()
    {
        Storage::fake('s3');

        $data = [
            'name' => 'update user',
            'email' => 'update@example.com',
            'photo' => UploadedFile::fake()->image('update_photo.jpg'),
            'password' => 'update1234',
            'password_confirmation' => 'update1234',
        ];

        $response = $this->actingAs($this->user)
            ->json('PUT', route('update'), $data);

        $user = User::first();

        $this->assertEquals($data['name'], $user->name);

        $response
            ->assertStatus(200)
            ->assertJson(['name' => $user->name]);
    }
}
