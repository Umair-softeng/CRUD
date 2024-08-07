<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Order::with('product.category')->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "order_read";
                $updateGate = "order_update";
                $deleteGate = "order_delete";
                $route = "order";
                $primaryKey = "orderID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->editColumn('name', function ($row) {
                return $row->name;
            });

            $table->editColumn('productID', function ($row) {
                return $row->product->name;
            });

            $table->editColumn('productPrice', function ($row) {
                return $row->product->price;
            });

            $table->editColumn('categoryName', function ($row) {
                return $row->product->category->name;
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        $breadcrumbs = [
            ['link' => "/order", 'name' => "Order"], ['name' => 'List']
        ];

        return view('order.index', compact('breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $breadcrumbs = [
            ['link' => "/order", 'name' => "Order"], ['name' => 'Create']
        ];
        return view('order.create', compact('breadcrumbs', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        Order::create($request->all());
        return redirect()->route('order.index')->with('message', 'Order Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load('product.category');
        $breadcrumbs = [
            ['link' => "/order", 'name' => "Order"], ['name' => 'List']
        ];
        return view('order.show', compact('breadcrumbs', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = Product::all();
        $order->load('product');
        $breadcrumbs = [
            ['link' => "/order", 'name' => "Order"], ['name' => 'Edit']
        ];
        return view('order.edit', compact('breadcrumbs', 'order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('order.index')->with('message', 'Order Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('message', 'Order Deleted Successfully!!');
    }
}
