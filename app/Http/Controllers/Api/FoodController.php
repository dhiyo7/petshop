<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    {
        return response()->json(Response::transform(Food::all(), 'OK', true), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => 'required|mimes:jpg,jpeg,png|max:1024',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'seller' => 'required|string',
            'category' => '',
            'description' => ''
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array(
                'message' => 'check your request again',
                'status' => false), 400);
        } else {
            $food = new Food();
            $image = $request->file('image')->store('food');
            $food->image = $image;
            $food->name = $request->name;
            $food->price = $request->price;
            $food->seller = $request->seller;
            $food->category = $request->category;
            $food->description = $request->description;
            $food->save();

            return response()->json(
                Response::transform($food, "A new food created successfully", true), 201
            );
        }
    }

    public function show($id)
    {
        $food = Food::find($id);
        if (is_null($food)) {
            return response()->json(array('message' => 'record not found', 'status' => false), 200);
        } else {
            return response()->json(Response::transform($food, "a food found", true), 200);
        }
    }

    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        if ($food != null) {
            if ($request->image != null) {
                Storage::delete($food->image);
                $image = $request->file('image')->store('food');
                $food->image = $image;
            }
            if ($request->name != null) {
                $food->name = $request->name;
            }
            if ($request->price != null) {
                $food->price = $request->price;
            }
            if ($request->seller != null) {
                $food->seller = $request->seller;
            }
            if ($request->category != null) {
                $food->category = $request->category;
            }
            if ($request->description != null) {
                $food->description = $request->description;
            }
            $food->update();
            return response()->json(
                array(
                    'message' => 'a chosen food updated successfully',
                    'status' => true,
                ), 200
            );
        }
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        if (is_null($food)) {
            return response() -> json(array('message'=>'cannot delete because record not found', 'status'=>false),200);
        } else {
            Food::destroy($id);
            return response() -> json(array('message'=>'succesfully deleted', 'status' => false), 200);
        }
    }
}
