<?php

namespace App\Http\Controllers\Admin\image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image=Image::all();
        return view('admin.image.index',compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $products= Product::pluck('name', 'id');
        return view('admin.image.create', compact('products'));
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
        /*$data['path'] = 'images/'.$request->path;*/
        //dd($data);

        if ($request->hasFile('path')) {
                $name_image = $request->path->getClientOriginalName();
                $newName = '/images/'.md5(microtime(true)).$name_image;
                $request->path->move(public_path('/images/'), $newName);
                $data['path'] = $newName;
                
                Image::create($data);  
          
            }
        return redirect()->route('index-image')->with('status','thêm thành công');
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
        $image= Image::find($id);
        $products= Product::pluck('name', 'id');
        return view('admin.image.edit', compact('image', 'products'));
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
        $image = Image::find($id);
        $data= $request->all();
         if ($request->hasFile('path')) {
                $name_image = $request->path->getClientOriginalName();
                $newName = '/images/'.md5(microtime(true)).$name_image;
                $request->path->move(public_path('/images/'), $newName);
                $data['path'] = $newName;
               $image->update($data);
     }
        return redirect()->route('index-image')->with('status','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $image=Image::find($id);
        if ($image!=null) {
            # code...
      
        $image->delete();
        //cach 2 
        // $products::destroy($id);
        return redirect()->route('index-image')->with('status','xóa thành công');
    }
    return redirect()->route('index-image')->with('status','xóa thất bại');
    }
}
