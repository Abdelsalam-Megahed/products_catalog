<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json([$category , Response::HTTP_CREATED]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(["status_code", Response::HTTP_NO_CONTENT]);
    }
}
