<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Carbon;
use DataTables;
use DB;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function showAllProducts(){
        return view('pages.deshboard.index',[
            'products' => Product::with('user')->get(),
        ]);
    }

    public function orderStore(Request $request,$product_id){
        Order::create([
            'product_id' => $product_id,
            'user_id' => auth()->user()->id
        ]);
        return  redirect()->route('buyer.product')->with('success', 'success Done.');
    }

    public function myOrders(Request $request){
        
        if ($request->ajax()) {
            $data = Order::with('product')->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function ($data){
                $created_at = "{$data->created_at->diffForHumans()}";
                return $created_at; 
            })
            ->make(true);
        }
        return view('pages.orders.index');
    }
}
