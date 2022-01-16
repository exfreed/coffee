<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));
    }
    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('product');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->street, $request->building, $request->apartment, $request->phone, $request->email);
        if ($success){
            session()->flash('success','Ваш заказ принят!');
        }
        return redirect()->route('product');
    }
    public function basketPlace(){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }
    public function basketAdd($produstId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }
        else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($produstId)){
            $pivotRow = $order->products()->where('product_id', $produstId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }
        else{
            $order->products()->attach($produstId);
        }
        if (Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }
        $product = Product::find($produstId);
        session()->flash('success', 'Добавлен товар '. $product->name);
        
        return redirect()->route('basket');
    }
    public function BasketRemove ($produstId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if ($order->products->contains($produstId)){
            $pivotRow = $order->products()->where('product_id', $produstId)->first()->pivot;
            if ($pivotRow->count < 2){
                $order->products()->detach($produstId);
            }
            else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product = Product::find($produstId);
        session()->flash('warning', 'Удален товар '. $product->name);
        return redirect()->route('basket');
    }
}
