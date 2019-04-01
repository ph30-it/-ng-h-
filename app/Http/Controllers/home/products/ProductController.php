<?php

namespace App\Http\Controllers\home\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\Category;
use App\Comment;
use Auth;
use App\User;

class ProductController extends Controller
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
            $products=Product::with('images')->where('category_id',request()->cate)->paginate(4);
        }else{
            $products=Product::with('images')->paginate(4);
        }
        $newproduct = Product::with('images')->orderBy('id','DESC')->LIMIT(8)->get()->toArray();
        $saleproduct = Product::with('images')->where('priceSale','!=',0)->get()->toArray(); 
        return view('home.products.shop', compact('categories','products','newproduct','saleproduct'));
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
    //product-details
    public function show($id)
    {
        //
        $product = Product::with('images')->find($id)->toArray();
        $category = Category::with('products')->Where('id', $product['category_id'])->get()->toArray();
        $relatedproduct = Product::with('images')->where('category_id',$category[0]['id'])->get()->toArray();
        $comments = Comment::where('product_id',$id)->get();
        //dd($comments);
        return view('home.products.product-detail', compact('product', 'category','relatedproduct','comments'));
    }

    public function comment(Request $request)
    {
        $comment = $request->all();
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        if(Auth::check()){
            $data = Comment::create([
                'name'=> $comment['name'],
                'email'=> $comment['email'],
                'content'=> $comment['content'],
                'rate'=>$rating->rating = $request->rate,
                'product_id'=> $comment['product_id'],
                'user_id'=> Auth::user()->id,
            ]);
        }else{
            $data = Comment::create([
                'name'=> $comment['name'],
                'email'=> $comment['email'],
                'content'=> $comment['content'],
                'rate'=>$rating->rating = $request->rate,
                'product_id'=> $comment['product_id'],
            ]);
        }
       
       return redirect()->back();
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
