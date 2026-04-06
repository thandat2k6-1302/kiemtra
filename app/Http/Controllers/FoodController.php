<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\FoodRequest;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all()->groupBy('category');
        return view('foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ["Hoa quả", "Thực phẩm hữu cơ", "Thực phẩm khô", "Sản phẩm nổi bật"];
        return view('foods.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
            $data['image'] = $imagePath;
        }

        Food::create($data);

        return redirect()->route('foods.index')->with('success', 'Thêm thực phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
    }
}
