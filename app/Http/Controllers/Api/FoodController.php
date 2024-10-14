<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use hg\apidoc\Auth;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function listFood()
    {
        $categories = Category::with('foods')->get();
        return $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Food::with('category')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // storing the image
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        // storing the data to database
        Food::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category'),
            'description'=>$request->get('description'),
            'image'=>$name
        ]);

        return response()->json([
            'message' => 'Food added successfully'
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
        if (!Food::find($id)) {
            return response()->json([
                'message' => 'Food not found'
            ], 204);
        }

        return Food::with('category')->find($id);
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

        if (!Food::find($id)) {
            return response()->json([
                'message' => 'Food not found'
            ], 204);
        }

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $food = Food::find($id);
        $name = $food->image;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        // updating the database
        $food->update([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category'),
            'description'=>$request->get('description'),
            'image'=>$name
        ]);

        return response()->json([
            'message' => 'Food updated successfully'
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
        if (!Food::find($id)) {
            return response()->json([
                'message' => 'Food not found'
            ], 204);
        }

        Food::destroy($id);
        return response()->json([
            'message' => 'Food deleted successfully'
        ], 200);
    }
}
