<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use App\Model\Author;
use App\Model\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;

    protected $category;

    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }

    public function index()
    {
        $posts      = $this->post->listItems('get_all_items');

        $categories = $this->category->listItems('get_all_items');

        $authors    = Author::all();

        return view('backend.page.post.index')->with([
            'posts'      => $posts,
            'categories' => $categories,
            'authors'    => $authors,
        ]);
        
    }

    public function list(Request $request)
    {
        $posts      = $this->post->listItems('get_all_items');

        $categories = $this->category->listItems('get_all_items');

        $authors    = Author::all();

        
        return view('backend.page.post.list',compact('posts', 'categories', 'authors'));
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
    public function store(StorePostRequest $request)
    {
        $post = $this->post->storePost($request->all());

        $images = $this->post->getUrlImage($request,$post->id);

        return response()->json([
            'post'  => $post,
            'images'  => $images,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->post->editPost($id);
        return response()->json(['data' => $data]);

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
        $data       = $this->post->editPost($id);

        $updatePost = $data[0]->updatePost($request->all());

        $images     = $this->post->getUrlImage($request,$data[0]['id']);

        return response()->json([
            'data'  => $data,
            'images'  => $images,
            'updatePost'  => $updatePost,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post   = $this->post->getIdPost($id);
        $image  = $this->post->deleteImage($post->id);
        $post->deletePost();
        return response()->json([
                'post'  => $post,
                'image' => $image,
            ], 200);
    }
}
