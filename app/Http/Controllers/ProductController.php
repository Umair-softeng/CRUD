<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::with('category')->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "product_read";
                $updateGate = "product_update";
                $deleteGate = "product_delete";
                $route = "product";
                $primaryKey = "productID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->editColumn('name', function ($row) {
                return $row->name;
            });

            $table->editColumn('categoryID', function ($row) {
                return $row->category->name;
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        $breadcrumbs = [
            ['link' => "/product", 'name' => "Product"], ['name' => 'List']
        ];

        return view('product.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $breadcrumbs = [
            ['link' => "/product", 'name' => "Product"], ['name' => 'Create']
        ];
        return view('product.create', compact('breadcrumbs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('product.index')->with('message', 'Product Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('category');
        $breadcrumbs = [
            ['link' => "/product", 'name' => "Product"], ['name' => 'List']
        ];
        return view('product.show', compact('breadcrumbs', 'product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('category');
        $breadcrumbs = [
            ['link' => "/product", 'name' => "Product"], ['name' => 'Edit']
        ];
        return view('product.edit', compact('breadcrumbs', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index')->with('message', 'Product Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Product Deleted Successfully!!');
    }
}
