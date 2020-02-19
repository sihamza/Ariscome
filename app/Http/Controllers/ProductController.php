<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $product = new Product ;
      try {
      $product->fill([
        'name' => $request->input('name') ,
        'price' => $request->input('price') ,
        'qty' => $request->input('qty')  ,
        'img' => $request->input('img') ,
        ]) ;
       $product->save(); }
       catch (QueryException $e){
           $emailExist = 'Email already exists !! Please try another .' ;
           return back()->with('emailExist' , $emailExist );
       }
       return back() ;
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product  , Request $request  )
    {
      $product = Product::where('id', $request->input('id') )->first() ;
      if ( $product ) {
        try {
        $product->fill([
          'name' => $request->input('name') ,
          'price' => $request->input('price') ,
          'qty' => $request->input('qty')  ,
          'img' => $request->input('img') ,
          ]) ;
         $product->save(); }
         catch (QueryException $e){
             $emailExist = 'Email already exists !! Please try another .' ;
             return back()->with('emailExist' , $emailExist );
         }
         return redirect('/dashboard');
      }
      return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product , $id)
    {
      $product = Product::where('id', $id )->first() ;
      if ( $product ) {
        return view('modify')->with('product', $product) ;
      }
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product , $id )
    {
        $product = Product::where('id', $id )->first() ;
        if ( $product ) {
          $product->delete();
        }
        return back();
    }
}
