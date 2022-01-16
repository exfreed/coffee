<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function orders(){
        $orders = Auth::user()->orders()->where('status', 1)->get();
        return view('orders', compact('orders'));
    }
    public function show(Order $order){
        if (Auth::user()->orders->contains($order)){
            return view('show', compact('order'));
        }
    }
}