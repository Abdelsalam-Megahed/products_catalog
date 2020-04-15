<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['error' => 'Record not found'], Response::HTTP_NOT_FOUND);
        }
        return Product::find($id);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:20',
            'price','rating' => 'required|Numeric',
            'quantity' => 'required|integer',
            'in_stock' => 'required|boolean',
            'category_id' =>'required|exists:categories,id'
        ];
            $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $product = Product::create($request->all());
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'min:3',
            'description' => 'min:20',
            'price','rating' => 'Numeric',
            'quantity' => 'integer',
            'in_stock' => 'boolean',
            'category_id' =>'exists:categories,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(["response" => "Product has been deleted"], Response::HTTP_ACCEPTED);
    }
}
