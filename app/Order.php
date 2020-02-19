<?php

namespace App;

use App\User ;
use App\Product ;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','product_id', 'revenue', 'qty','confirmed'
    ];


     public static function getOrders($user_id){

     $orders = ($user_id == null) ? Order::all() : Order::where('user_id',$user_id)->get() ;

     foreach ($orders as $order) {
         $order->user_id = User::find($order->user_id)->nom . ' ' .  User::find($order->user_id)->prenom  ;
         $order->img =  Product::find($order->product_id)->img ;
         $order->product = Product::find($order->product_id) ;
         $order->product_id = Product::find($order->product_id)->name ;
     }

     return $orders ;
    }



}
