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

   	$products =Product::paginate(5);
     $category=Category::pluck('name','id');
   	return view('admin.product.home',compact('products','category'));
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
        return redirect()->route('index-product')->with('status','xóa thành công');
    }
    return redirect()->route('index-product')->with('status','xóa thất bại');
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
         try{

        $data= $request->except('path');
        $product = Product::create($data);
      
       if ($request->hasFile('path')) {
               $name_image = $request->path->getClientOriginalName();
                $newName = '/images/admin/'.md5(microtime(true)).$name_image;
                $request->path->move(public_path('/images/admin/'), $newName);
                $data['path'] = $newName;
                Image::create([
                     'path'=>$newName,
                     'product_id'=>$product->id,

                ]);
                 
                return redirect()->route('index-product')->with('status','thêm sản phẩm thành công');
                                       }
             }
           catch(\Exception $e) {
            

                return redirect()->route('create-product')->with('status','thêm sản phẩm thất bai');
            
                              }
     
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showproduct($id)
    {
       $products = Product::with('images')->where('id', $id)->get();
        $category= Category::pluck('name', 'id');
        return view('admin.product.show', compact('products', 'category'));
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
        try{
        $products = Product::find($id);
        $data= $request->all();
        $products->update($data);

        return redirect()->route('index-product')->with('status','sửa sản phẩm thành công');
    }catch (\Exception $ex) {
            
                return redirect()->route('edit-product')->with('status','sửa sản phẩm thất bại ');

            }
      
    }
   
}