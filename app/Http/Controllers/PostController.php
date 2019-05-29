<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const PHOTO_LENGTH = 12;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Post.
     * @param StorePost $request
     * @return \Illuminate\Http\Response
     */
    public function create(StorePost $request)
    {
        $post = new Post();
        $post->content = $request->content;

        logger($request);
        if (! empty($request->photo)) {
            $extension = $request->photo->extension();

            $photo_filename = $this->getRandomId().'.'.$extension;

            Storage::cloud()->putFileAs('/posts/', $request->photo, $photo_filename);
            $post->photo_filename = $photo_filename;
        }

        Auth::user()->posts()->save($post);

        return response($post, 201);
    }

    /**
     * Post List.
     */
    public function index()
    {
        $posts = Post::with(['owner'])
            ->orderBy(Post::CREATED_AT, 'desc')->paginate(10);

        return $posts;
    }

    /**
     * ランダムなID値を生成する.
     * @return string
     */
    private function getRandomId()
    {
        $characters = array_merge(
            range(0, 9), range('a', 'z'),
            range('A', 'Z'), ['-', '_']
        );

        $length = count($characters);

        $id = '';

        for ($i = 0; $i < self::PHOTO_LENGTH; $i++) {
            $id .= $characters[random_int(0, $length - 1)];
        }

        return $id;
    }
}
