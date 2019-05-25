<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Post
     * @param StorePost $request
     * @return \Illuminate\Http\Response
     */
    public function create(StorePost $request)
    {
        $post = new Post();
        $post->content = $request->content;


        if (!empty($data['photo'])) {
            $extension = $data['photo']->extension();

            $photo_filename = $this->RandomId() . '.' . $extension;

            Storage::cloud()->putFileAs('posts', $data['photo'], $photo_filename);
            $post->photo_filename = $photo_filename; 
        }

        Auth::user()->posts()->save($post);

        return response($post, 201);
    }

    /**
     * Post List
     */
    public function index()
    {
        $posts = Post::with(['owner'])
            ->orderBy(Post::CREATED_AT, 'desc')->paginate(10);

        return $posts;
    }
}
