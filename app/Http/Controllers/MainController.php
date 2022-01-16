<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(){
        return view('login');
    }
    public function signup(){
        return view('signup');
    }
    public function product(){
        $products = Product::get();
        return view('product', compact('products'));
    }
}