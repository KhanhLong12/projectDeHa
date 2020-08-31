<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\EditAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $author;
    public function __construct(Author $author){

        $this->author = $author;
    }

    public function index()
    {
        $items = $this->author->listItems('get_all_items');

        return view('backend.page.author.index')->with([
            'items' => $items,
        ]);
    }

    public function list(Request $request)
    {
        $items           = $this->author->all();
        return view('backend.page.author.list',compact('items'));
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
    public function store(StoreAuthorRequest $request)
    {
        // dd($request->file('thumb'));
        $author = $this->author->store($request->all());
            return response()->json([
                'author'  => $author,
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
        $data = $this->author->detail($id);
        // dd($data[1]);
        return view('backend.page.author.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Author::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAuthorRequest $request, $id)
    {
        $author  = Author::findOrFail($id)->update($request->all());
            return response()->json([
                'author'  => $author,
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
        $author = Author::findOrFail($id)->delete();
        return response()->json([
                'author'          => $author,
            ], 200);
    }

    public function fcsearch(Request $request)
    {

        $items = $this->author->search($request->input('search'));
        return view('backend.page.author.list',compact('items'));
    }
}
