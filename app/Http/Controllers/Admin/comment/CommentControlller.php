<?php

namespace App\Http\Controllers\Admin\comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\User;
class CommentControlller extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $comment =Comment::paginate(7);
        return view('admin.comment.index',compact('comment'));

        }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
         $products= Product::pluck('name', 'id');
         $user=User::pluck('name','id');
        return view('admin.comment.create', compact('products','user'));
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
        Comment::create($data);
        return redirect()->route('index-comment')->with('status','thêm thành công');
          }catch(Exception $e){
        return redirect()->route('index-comment')->with('status','thêm thất bại');

         }
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
        $comment= Comment::find($id);
        $products= Product::pluck('name', 'id');
        $user=User::pluck('name','id');
        return view('admin.comment.edit', compact('comment', 'products','user'));
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
        $comment = Comment::find($id);
        $data= $request->all();
        $comment->update($data);
        return redirect()->route('index-comment')->with('status','sửa thành công');
         }catch(Exception $e){
        return redirect()->route('index-comment')->with('status','sửa thất bại');
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){


        $comment=Comment::find($id);
        if ($comment!=null) {
            # code...
      
        $comment->delete();
        //cach 2 
        // $products::destroy($id);
        return redirect()->route('index-comment')->with('status','xóa thành công');
    }
    return redirect()->route('index-comment')->with('status','xóa thất bại');
    }
}
