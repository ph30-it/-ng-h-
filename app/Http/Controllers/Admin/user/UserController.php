<?php

namespace App\Http\Controllers\Admin\user;  

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::paginate(8);
        return view('admin.user.home',compact('user'));

        }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
         $role= Role::pluck('name', 'id');
        return view('admin.user.create', compact('role'));
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
        User::create($data);
        return redirect()->route('index-user')->with('status','thêm thành công');
          }catch(Exception $e){
        return redirect()->route('index-user')->with('status','thêm thất bại');

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
        $user= User::find($id);
        $role= Role::pluck('name', 'id');
        return view('admin.user.edit', compact('user', 'role'));
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
        $user = User::find($id);
        $data= $request->all();
        $user->update($data);
        return redirect()->route('index-user')->with('status','sửa thành công');
         }catch(Exception $e){
        return redirect()->route('index-user')->with('status','sửa thất bại');
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
         $user=User::find($id);
        if ($user!=null) {
            # code...
      
        $user->delete();
        //cach 2 
        // $products::destroy($id);
        return redirect()->route('index-user')->with('status','xóa thành công');
    }
    return redirect()->route('index-user')->with('status','xóa thất bại');
    }
}
