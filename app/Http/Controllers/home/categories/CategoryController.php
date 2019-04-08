<?php

namespace App\Http\Controllers\home\categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Order;
use App\Order_detail;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $categories = Category::all();
        if (isset(request()->cate)) {
            $products=Product::with('images')->where('category_id',request()->cate)->get()->toArray();
        }else{
            $products=Product::with('images')->take(12)->get()->toArray();
        }
        $newproduct = Product::with('images')->orderBy('id','DESC')->LIMIT(8)->get()->toArray();
        $saleproduct = Product::with('images')->where('priceSale','!=',0)->get()->toArray();
        $hotproduct = Order_detail::with('products')->selectRaw('product_id, sum(quantity) as total' )->groupBy('product_id')->take(10)->get();
        
        return view('home.index', compact('categories','products','newproduct','saleproduct','hotproduct'));
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
        $categories = Category::all();
        $product = Product::findorFail($id)->get();
        return view('home.index',compact('product','categories'));

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
