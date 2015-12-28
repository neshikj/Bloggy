<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
        $posts = Post::with('user')->orderBy('published_at', 'desc')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required']);
        $post = new Post($request->all());
        $post['published_at'] = Carbon::now();
        $response = Auth::user()->posts()->save($post);

        return $response;
    }
}
