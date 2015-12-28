<?php

namespace App\Http\Controllers;

use App\Post;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lartests\Transformers\PostTransformer;
use Input;
use Request;

class ApiPostsController extends ApiController
{
    const TYPE_XML = 'application/xml';

    /**
     * @var App\Lartests\Transformers\PostTransformer
     */
    protected  $postTransformer;

    function __construct(PostTransformer $postTransformer)
    {
        parent::__construct();
        $this->postTransformer = $postTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = Input::get('limit') ?: 5;
        if ($limit > 15)
        {
            return $this->respondLimitNotAllowed('You are not allowed to fetch more than 15 posts per page.');
        }

        $posts = Post::paginate($limit);

        return $this->respondWithPagination($posts, [
            'data' => $this->postTransformer->transformCollection(($posts->all())),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post)
        {
            return $this->respondNotFound('Post does not exist.');
        }

        return $this->respond([
            'data' => $this->postTransformer->transform($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
