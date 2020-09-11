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

    protected $author;

    public function __construct(Post $post, Category $category, Author $author)
    {
        $this->post = $post;

        $this->category = $category;

        $this->author = $author;
    }

    public function index()
    {
        $categories = $this->category->all();
        $authors = $this->author->all();

        return view('backend.page.post.index')->with([
            'categories' => $categories,
            'authors' => $authors,
        ]);

    }

    public function list()
    {
        $posts = $this->post->all();
        return view('backend.page.post.list', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->post->create($request->all());

        $images = $this->post->getUrlImage($request->file('images'), $post->id);

        return response()->json([
            'post' => $post,
            'images' => $images,
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = $this->post->with('images')->findOrFail($id);
        return response()->json([
            'post' => $post,
        ]);

    }

    public function update(Request $request, $id)
    {
        $data = $this->post->findOrFail($id)->update($request->all());

        $images = $this->post->getUrlImage($request->file('images'), $data['id']);

        return response()->json([
            'data' => $data,
            'images' => $images,
        ], 200);
    }

    public function destroy($id)
    {
        $status = $this->post->destroy($id);
        return response()->json([
            'post' => $status,
        ], 200);
    }
}
