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

    private $validationRules = [
        'name' => ['required', 'min:2', 'max:50',],
        'price' => ['required', 'numeric', 'max:1000', 'min:0.01',],
        'description' => ['required', 'min:10', 'max:1000',],
        'dishPic' => ['required', 'image'],
        'visible' => ['required', 'boolean'],
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
        $newDish->restaurant_id = Auth::user()->restaurant->id;

        return view('admin.dish.create', compact('newDish'));
        // if($newDish->restaurant->user_id == auth()->id()) {
        //     return view('admin.dish.create', compact('newDish'));
        // } else {
        //     return view('admin.dish.errors.accessDenied');
        // }
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

        $request->validate($this->validationRules);

        $newDish = new Dish();
        $sentData['dishPic']= Storage::put('uploads', $sentData['dishPic']);
        $sentData['restaurant_id'] = Auth::user()->restaurant->id;
        $newDish = $newDish->create($sentData);
        return redirect()->route('admin.dish.show', $newDish->id)->with('created' , 'The dish ' . '"' . $sentData['name'] . '"' . ' has been created!');
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
        if($dish->restaurant->user_id == auth()->id()) {
            return view('admin.dish.show' , compact('dish'));
        } else {
            return view('admin.dish.errors.accessDenied');
        }
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
        if($newDish->restaurant->user_id == auth()->id()) {
            return view('admin.dish.edit', compact('newDish'));
        } else {
            return view('admin.dish.errors.accessDenied');
        }
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

        $request->validate([
            'name' => ['required', 'min:2', 'max:50',],
            'price' => ['required', 'numeric', 'max:1000', 'min:0.01',],
            'description' => ['required', 'min:10', 'max:1000',],
            'dishPic' => ['image'],
            'visible' => ['required', 'boolean'],
        ]);

        $dish = Dish::findOrFail($id);

        if(array_key_exists('dishPic', $sentData)){
            $sentData['dishPic']= Storage::put('uploads', $sentData['dishPic']);
        }
        else{
            $sentData['dishPic'] = $dish->dishPic;
        }
        $dish = $dish->update($sentData);
        return redirect()->route('admin.dish.show', $id)->with('edited' , 'The dish ' . '"' . $sentData['name'] . '"' . ' has been edited!');
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
        return redirect()->route('admin.restaurant.index')->with('delete' , 'The dish ' . '"' . $dish->name . '"' . ' has been deleted!');
    }
}
