<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\EditAuthorRequest;

class AuthorController extends Controller
{

    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        return view('backend.page.author.index');
    }

    public function list(Request $request)
    {
        $authors = $this->author->search($request->input('search'));
        return view('backend.page.author.list', compact('authors'));
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = $this->author->createNew($request->all(), $request->file('thumbnail'));

        return response()->json([
            'author' => $author,
        ], 200);
    }

    public function show($id)
    {
        $author = $this->author->with('posts')->findOrFail($id);
        return view('backend.page.author.detail', compact('author'));
    }

    public function edit($id)
    {
        $author = $this->author->findOrFail($id);
        return response()->json(['author' => $author]);
    }

    public function update(EditAuthorRequest $request, $id)
    {
        $author = $this->author->findOrFail($id);
        $author->updateAuthor($id, $request->all(), $request->file('thumbnail'));
        return response()->json([
            'author' => $author,
        ], 200);

    }

    public function destroy($id)
    {
        $status = $this->author->destroy($id);
        return response()->json([
            'author' => $status,
        ], 200);
    }
}
