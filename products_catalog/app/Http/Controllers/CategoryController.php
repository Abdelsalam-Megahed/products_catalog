<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use App\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('products')->get();
        return $categories;
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['error' => 'Record not found'], Response::HTTP_NOT_FOUND);
        }
        $category->products;
        return $category;
    }

    public function store(Request $request)
    {
        $validator =  $this->validateRequest($request);
        if($validator->fails()){
            return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $category = Category::create($request->all());
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {   $validator =  $this->validateRequest($request);
        if($validator->fails()){
            return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $count = count($category->products);

        if($count == 0){
            $category->delete();
            return response()->json(["response" => "Category has been deleted"], Response::HTTP_ACCEPTED);
        }
        else{
            return response()->json([
                "error" =>
                "You cannot delete category that has more than one product"],
                Response::HTTP_FORBIDDEN);
        }

    }

    public function validateRequest(Request $request){
        $rules = [
            'name' => 'required|min:3|unique:categories',
        ];

        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }
}
