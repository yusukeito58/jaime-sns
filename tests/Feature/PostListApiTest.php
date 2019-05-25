<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class PostListApiTest extends TestCase
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
    public function returnCorrectStructureJson()
    {
        Storage::fake('s3');

        factory(Post::class, 5)->create();

        $response = $this->actingAs($this->user)->json('GET', route('post.index'));

        $posts = Post::with(['owner'])->orderBy('created_at', 'desc')->get();

        $expected_data = $posts->map(function($post) {
            return [
                'id' => $post->id,
                'user_id' => $post->user_id,
                'content' => $post->content,
                'photo_filename' => 'dummy_post_photo.jpg',
                'created_at' => $post->created_at->toDateTimeString(),
                'owner' => [
                    'name' => $post->owner->name,
                    'photo_url' => '/storage/dummy_photo.jpg',
                ],
            ];
        })
        ->all();

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonFragment([
                'data' => $expected_data,
            ]);
    }
}
