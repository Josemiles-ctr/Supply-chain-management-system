<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{//show available products
    public function index(){
        $products = Product::all();
        return view("orders.index",compact("products"));
    }
    //place an order
    public function store(Request $request){
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;
        if($product->stock < $quantity){
            return back()->with("error","there is insufficient stock");
        }
        $total = $product->price * $quantity;
        //create order
        Order::create([
            'user_id' => Auth::id(),
            'product_id'=> $product->id,
            'quantity'=> $quantity,
            'total_price' => $total
        ]);
        //reduce stock
        $product->stock -= $quantity;
        $product->save();
        return redirect()->route('orders.my')->with('success','Order placed successfully');

}
public function myOrders(){
    $orders = Order::where('user_id', Auth::id())->with('product')->get();
    return view('orders.my',compact('orders'));
}
}