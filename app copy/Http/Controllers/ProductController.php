<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use DataTables;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Product::all();
            $data = auth()->user()->product;
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function ($data){
                $created_at = "{$data->created_at->diffForHumans()}";
                return $created_at; 
            })
            ->make(true);
        }
        return view('pages.product.index');
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'price' => 'required|max:255', 
                    'qty' =>  'required|max:255', 
                ],['qty.required' => 'qunatity Required']);
        
                if ($validator->fails()) {
                    throw new ValidationException($validator);
                }
        
                $obj = $request->all();
                $obj['user_id'] = auth()->user()->id;
                Product::updateOrCreate(
                    ['id' => $request->product_id],
                    $obj
                );
            });
        
            return response()->json([
                'status' => 200,
                'message' => 'Record added or updated successfully!',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status'=>200,
            'message'=>"Deleted successfully",
        ]);
    }
}
