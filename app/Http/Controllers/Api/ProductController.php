<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
class ProductController extends Controller
{
    public function allProducts(){
        $result = Product::with('user')->get();
        return response()->json($result);
    }
    public function product($id){
        $result = Product::with('user')->where('id',$id)->first();
        return response()->json($result);
    }
    public function orders($product_id){
        $result = Order::with('product')->where('product_id',$product_id)->get();
        return response()->json($result);
    }
}
