<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::getOrders(null);
      return view('orders')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $product = Product::find($request->input('id')) ;
      $order = new Order ;
      if ($product) {
      try {
        $order->fill([
          'user_id' => Auth::user()->id ,
          'product_id' => $request->input('id') ,
          'revenue' => $request->input('qty') * $product->price ,
          'qty' => $request->input('qty')
          ]) ;
         $order->save(); }
         catch (QueryException $e){
             $emailExist = 'Email already exists !! Please try another .' ;
             return back()->with('emailExist' , $emailExist );
         }
      }
      return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $order = Order::find($id) ;
      if ($order && $order->user_id == Auth::user()->id ) {
        $order->delete();
      }
      return back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $order = Order::find($id) ;
      if ($order) {
        $order->confirmed = true ;
        $product = Product::find($order->product_id) ;
        $product->qty -= $order->qty ;
        $product->save();
        $order->save();
      }
      return back() ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id) ;
        if ($order) {
          $order->delete();
        }
        return back() ;
    }
}
