<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $parentCategory = $this->category->getParentCategory();
        return view('backend.page.category.index')->with([
            'parentCategory' => $parentCategory
        ]);
    }

    public function list(Request $request)
    {
        $categories = $this->category->search($request->input('search'));
        $parentCategory = $this->category->getParentCategory();

        return view('backend.page.category.list', compact('categories', 'parentCategory'));
    }



    public function store(StoreCategoryRequest $request)
    {
        $category = $this->category->create($request->all());
        return response()->json([
            'category' => $category,
        ], 200);
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return response()->json(['category' => $category]);
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $getCategory = $this->category->findOrFail($id);
        $getCategory->update($request->all());

        return response()->json([
            'category' => $getCategory,
        ], 200);

    }

    public function destroy($id)
    {
        $status = $this->category->destroy($id);
        return response()->json([
            'category' => $status,
        ], 200);
    }

    public function getParentCategory()
    {
        $parentCategory = $this->category->getParentCategory();
        return view('backend.page.category.parent_category', compact('parentCategory'));
    }

    public function getParentCategoryEdit()
    {
        $parentCategory = $this->category->getParentCategory();
        return view('backend.page.category.parent_category_edit', compact('parentCategory'));
    }
}
