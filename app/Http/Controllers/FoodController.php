<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    // List Food - Page
    public function listFood()
    {
        $categories = Category::with('foods')->get();
        return view('index')->with('categories', $categories);
    }
    public function testing()
    {
        return $categories = Category::with('foods')->get();

    }

    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index()
    {
//        $foods = Food::latest()->paginate(1);
        $foods = Food::all();
//        return $foods;
        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('food.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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

//        return [
//            'name'=>$request->get('name'),
//            'price'=>$request->get('price'),
//            'category'=>$request->get('category'),
//            'description'=>$request->get('description'),
//            'image'=>$name
//        ];
        // storing the data to database
        Food::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category'),
            'description'=>$request->get('description'),
            'image'=>$name
        ]);

        return redirect()->back()->with('message', 'Food added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
//        return $food;
        return view('food.show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
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

        return redirect()->route('food.index')->with('message', 'Food updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);
        return redirect()->route('food.index')->with('message', 'Food deleted successfully');
    }
}
