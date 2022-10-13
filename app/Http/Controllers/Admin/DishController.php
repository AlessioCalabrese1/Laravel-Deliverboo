<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DishController extends Controller
{
    protected $validationRules = [

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newDish = new Dish();
        return view('admin.dish.create', compact('newDish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->all();
        $newDish = new Dish();
        $sentData['dishPic']= Storage::put('uploads', $sentData['dishPic']);
        $sentData['restaurant_id'] = Auth::user()->restaurant->id;
        $newDish = $newDish->create($sentData);
        return redirect()->route('admin.dish.show', $newDish->id)->with('created', $newDish->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $dish = Dish::findOrFail($id);
        return view('admin.dish.show' , compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newDish = Dish::findOrFail($id);
        return view('admin.dish.edit', compact('newDish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sentData = $request->all();
        $dish = Dish::findOrFail($id);
        $dish = $dish->update($sentData);
        return redirect()->route('admin.dish.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dish=Dish::findOrFail($id);
        $dish->delete();
        return redirect()->route('admin.restaurant.index')->with('delete' , $dish->name);
    }
}
