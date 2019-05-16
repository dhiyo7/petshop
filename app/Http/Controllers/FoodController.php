<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::orderBy('created_at', 'DESC')->get();
        return view('backend.food.food', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.food.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png|max:1024',
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $food = new Food();
        $image = $request->file('image')->store('food');
        $food->image = $image;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->save();

        return redirect()->route('admin.food')->with(['success' => 'A new food created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('backend.food.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png|max:1024',
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $food = Food::where('id', $id)->first();
        if ($request->image != null) {
            Storage::delete($food->image);
            $image = $request->file('image')->store('food');
            $food->image = $image;
        }
        $food->name = $request->name;
        $food->price = $request->price;
        $food->update();
        return redirect()->route('admin.food')->with(['success' => 'A chosen food updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::where('id', $id)->first();
        $food->delete();
        return redirect()->route('admin.food')->with(['success' => 'A chosen food removed successfully']);
    }
}
