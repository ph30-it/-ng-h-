<?php

namespace App\Http\Controllers\Admin\role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function index(){
   	$role =Role::all();
   	return view('admin.role.index',compact('role'));
   }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){


        $role=Role::find($id);
        if ($role!=null) {
        	# code...
      
        $role->delete();
        //cach 2 
        // $products::destroy($id);
        return redirect()->route('index-role');
    }
    return redirect()->route('index-role');
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {

        return view('admin.role.create');
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
        Role::create($data);
        return redirect()->route('index-role');
    }
 /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role= Role::find($id);
        return view('admin.role.edit', compact('role'));
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
        
        $role = Role::find($id);
        $data= $request->all();
        $role->update($data);
        return redirect()->route('index-role');
    }
}