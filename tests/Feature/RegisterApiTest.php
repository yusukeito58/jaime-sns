<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function createAndReturnNewUser()
    {
        Storage::fake('s3');

        $data = [
            'name' => 'dummy user',
            'email' => 'dummy@example.com',
            'photo' => UploadedFile::fake()->image('photo.jpg'),
            'password' => 'dummy1234',
            'password_confirmation' => 'dummy1234',
        ];

        $response = $this->json('POST', route('register'), $data);

        $user = User::first();

        $this->assertEquals($data['name'], $user->name);

        $response
            ->assertStatus(201)
            ->assertJson(['name' => $user->name]);

        Storage::cloud()->assertExists($user->photo_filename);
    }
}
