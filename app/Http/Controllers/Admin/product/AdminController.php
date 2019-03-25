<?php

namespace App\Http\Controllers\Admin\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Image;

class AdminController extends Controller
{
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function index(){
   	$products =Product::all();
   	return view('admin.product.home',compact('products'));
   }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){


        $products=Product::find($id);
        if ($products!=null) {
        	# code...
      
        $products->delete();
        //cach 2 
        // $products::destroy($id);
        return redirect()->route('index-product');
    }
    return redirect()->route('index-product');
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
    	 $categoryID= Category::pluck('name', 'id');
        return view('admin.product.create', compact('categoryID'));
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

        $data= $request->all();
        Product::create($data);
        return redirect()->route('index-product');
    }
 /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products= Product::find($id);
        $categoryID= Category::pluck('name', 'id');
        return view('admin.product.edit', compact('products', 'categoryID'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $products = Product::find($id);
        $data= $request->all();
        $products->update($data);
        return redirect()->route('index-product');
    }
}