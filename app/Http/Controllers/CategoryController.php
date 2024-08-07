<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Category::all();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "category_read";
                $updateGate = "category_update";
                $deleteGate = "category_delete";
                $route = "category";
                $primaryKey = "categoryID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->editColumn('name', function ($row) {
                return $row->name;
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        $breadcrumbs = [
            ['link' => "/category", 'name' => "Category"], ['name' => 'List']
        ];

        return view('category.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/category", 'name' => "Category"], ['name' => 'Create']
        ];
        return view('category.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('message', 'Category Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $breadcrumbs = [
            ['link' => "/category", 'name' => "Category"], ['name' => 'Details']
        ];
        return view('category.show', compact('breadcrumbs', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $breadcrumbs = [
            ['link' => "/category", 'name' => "Category"], ['name' => 'Edit']
        ];
        return view('category.edit', compact('breadcrumbs', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('category.index')->with('message', 'Category Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfully!!');

    }
}
