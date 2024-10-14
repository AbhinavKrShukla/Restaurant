<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Category::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required',
        ]);
        Category::create([
            'name' => $request->get('name'),
        ]);
        return response()->json([
            "message" => "Category created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        if (!Category::find($id)){
            return response()->json([
                "message" => "Category not found"
            ], 204);
        }
        return response()->json([
            "Category" => Category::find($id)
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (!Category::find($id)){
            return response()->json([
                "message" => "Category not found"
            ], 204);
        }

        $this->Validate($request, [
            'name' => 'required',
        ]);
        Category::update([
            'name' => $request->get('name'),
        ]);
        return response()->json([
            "message" => "Category updated successfully"
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (!Category::find($id)){
            return response()->json([
                "message" => "Category not found"
            ], 204);
        }
        Category::destroy($id);
        return response()->json([
            "message" => "Category deleted successfully"
        ], 200);
    }
}
