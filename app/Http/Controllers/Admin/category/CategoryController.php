<?php

namespace App\Http\Controllers\Admin\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
class CategoryController extends Controller
{
	  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        Category::orderBy('id','DESC');
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.category.create');
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
        $data= $request->all();
        Category::create($data);
        return redirect()->route('index-category')->with('status','thêm thành công');
    }catch(Exception $e){
        return redirect()->route('index-category')->with('status','thêm thất bại');

    }
    }
 /**

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
        $category= Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $category = Category::find($id);
        $data= $request->all();
        $category->update($data);
        return redirect()->route('index-category')->with('status','sửa Category thành công');
    }catch(Exception $e){
        return redirect()->route('index-category')->with('status','sửa category tthất bại');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Category=Category::find($id);
         $Category->products()->delete();
         $Category->delete();   
        return redirect()->route('index-category')->with('status','xóa thành công');
    }
    //
}
