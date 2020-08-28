<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Model\Category;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $category;
    public function __construct(Category $category){

        $this->category = $category;
    }

    public function index()
    {
        $items           = $this->category->listItems('get_all_items');
        $parent_category = $this->category->listItems('get_parent_name');
        return view('backend.page.category.index')->with([
            'items'           => $items,
            'parent_category' => $parent_category
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
    public function store(StoreCategoryRequest $request)
    {
            $category = $this->category->store($request->all());
            return response()->json([
                'category'  => $category,
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
        $data = Category::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category  = Category::findOrFail($id)->update($request->all());
            return response()->json([
                'category'  => $category,
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
        $category = Category::findOrFail($id)->delete();
        return response()->json([
                'category'  => $category,
            ], 200);
    }

    public function list(Request $request)
    {
        $items           = $this->category->all();
        $parent_category = $this->category->listItems('get_parent_name');
        return view('backend.page.category.list',compact('items','parent_category'));
    }


    public function fcsearch(Request $request)
    {

        $items           = $this->category->search($request->input('search'));
        $parent_category = $this->category->listItems('get_parent_name');
        return view('backend.page.category.list',compact('items','parent_category'));
    }
}
