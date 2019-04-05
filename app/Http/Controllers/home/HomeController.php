<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Image;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        return view('home.index');
    }

    public function search(Request $request)
     {
       $search = $request->get('search_product');
            if($search != ''){
                $products = Product::with('category')->where('id', 'like', '%'.$search.'%')
                        ->orWhere('name', 'like', '%'.$search.'%')
                        ->orWhere('price', 'like', '%'.$search.'%')
                        ->orderBy('id', 'desc')->paginate(4);
                        //dd($products);
            return view('home.products.search',compact('products','search'));
            }else{
              return redirect()->back();
            }
     }

    /*public function show($id)
    {
        $products = Product::findOrFail($id);

        $data = 'Name: ' . $products->name 
            . '<br/>Price: ' . $products->price;

        return $data;
    }*/
    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', "%{$query}%")->orWhere('price', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {  
                    $output .= '
               <li><a href="'.route('product-detail',$row->id).'">'.$row->name.'</a></li>
               '; 
           }
           $output .= '</ul>';
           echo $output;
       }
    }

    /* public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->value . '%')->get();
        dd($products);
        return response()->json($products); 
    }

    public function searchByPrice(Request $request)
    {
        $products = Product::where('price', 'like', '%' . $request->value . '%')->get();

        return response()->json($products); 
    }*/

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
