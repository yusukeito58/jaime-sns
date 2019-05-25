<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

class PostApiTest extends TestCase
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
    public function canPost()
    {
        $data = [
            'content' => 'test message'
        ];

        $response = $this->actingAs($this->user)
            ->json('POST', route('post.create'), $data);

        $response->assertStatus(201)
                ->assertJson([
                    'content' => $data['content'],
                ]);

        $post = Post::first();

        $this->assertRegExp('/^[0-9a-zA-Z-_]{12}$/', $post->id);
    }

    /**
     * @test
     */
    public function canPostWithPhoto()
    {
        Storage::fake('s3');

        $data = [
            'content' => 'test message with photo',
            'photo' => UploadedFile::fake()->image('posts-photo.jpg'),
        ];

        $response = $this->actingAs($this->user)
            ->json('POST', route('post.create'), $data);

        $response->assertStatus(201)
                ->assertJson([
                    'content' => $data['content'],
                ]);

        $post = Post::first();

        $this->assertRegExp('/^[0-9a-zA-Z-_]{12}$/', $post->id);
    }
}
