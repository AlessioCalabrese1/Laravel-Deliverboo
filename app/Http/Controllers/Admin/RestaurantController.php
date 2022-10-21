<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;

class RestaurantController extends Controller
{
    protected $validateDatas = [
        'name' => 'required|min:2|max:40',
        'address' =>'required|min:6|max:80, deve contenere un numero',
        'open' => 'required|date_format:H:i',
        'close' => 'required|date_format:H:i',
        'restaurantPic'=> 'required|image',
        'categories'=> 'required',

    ];

    //messaggi

    protected $validateDateMsgs = [
        'name.required' => 'Restaurant name is required',
        'name.min' => 'Restaurant name need to be min 2 characters',
        'name.max' => 'Restaurant name need to be max 40 characters',

        'address.unique'=> 'There is already a restaurant with this address',
        'address.required'=>'Restaurant address is required',
        'address.min' => 'Restaurant address need to be min 10 characters',
        'address.max' => 'Restaurant address need to be max 80 characters',

        'open.required'=> 'Opening time is required',
        'open.date_format'=> 'Opening time must be Hours:Minutes',
        'close.required' => 'Closing time is required',
        'close.date_format' => 'Closing time must be Hours:Minutes',

        'restaurantPic.required' => 'RestaurantPic is required',
        'restaurantPic.image' => 'RestaurantPic must be an image',

        'categories.required' => 'You have to check at least one category',
    ];

    public function index()
    {
        //
        $restaurants=Auth::user()->restaurant;
        if ($restaurants === null) {
            return redirect()->route('admin.restaurant.create');
        } else{
            $dishes=Dish::where('restaurant_id', Auth::id())->orderBy('name', 'asc')->get();
            return view('admin.restaurant.index', compact(['restaurants', 'dishes']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $newRestaurant = new Restaurant();
        $categories = Category::all();
        $restaurants = Auth::user()->restaurant;
        if ($restaurants === null) {
            return view('admin.restaurant.create', compact(['newRestaurant', 'categories']));
        } else {
            $dishes = Dish::where('restaurant_id', Auth::id())->orderBy('name', 'asc')->get();
            return view('admin.dish.errors.accessDenied', compact(['restaurants', 'dishes']));
        }
        // return view('admin.restaurant.create', compact(['newRestaurant', 'categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $sentData = $request->validate([
            'name' => 'required|min:2|max:40',
            'address' => 'required|min:6|max:80, deve contenere un numero',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i',
            'restaurantPic' => 'required|image',
            'categories' => 'required'
        ], $this->validateDateMsgs);
        //  dd($sentData);
        $newRestaurant = new Restaurant();
        $newRestaurant['user_id'] = Auth::user()->id;
        // dd($newRestaurant);
        $newRestaurant->fill($sentData);
        $newRestaurant->restaurantPic = Storage::put('uploads/user', $sentData['restaurantPic']);
        $newRestaurant->save();
        $newRestaurant->categories()->sync($sentData['categories']);
        return redirect()->route('admin.restaurant.index')->with('created' , 'The restaurant ' . '"' . $sentData['name'] . '"' . ' has been created!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newRestaurant = Restaurant::findOrFail($id);
        $categories = Category::all();
        if($newRestaurant->user_id == auth()->id()) {
            return view('admin.restaurant.edit', compact(['newRestaurant', 'categories']));
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
        $sentData = $request->validate([
            'name' => 'required|min:2|max:40',
            'address' => 'required|min:6|max:80, deve contenere un numero',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i',
            'restaurantPic' => 'image',
            'categories' => 'required'
        ], $this->validateDateMsgs);

        $newRestaurant = Restaurant::findOrFail($id);

        /**
         * Controllo se nell'edit è stata inserita un immagine o meno, nel secondo caso l'immagine finale sarà quella precedente!
         */
        if (array_key_exists('restaurantPic', $sentData)) {
            $sentData['restaurantPic'] = Storage::put('uploads', $sentData['restaurantPic']);
        }else{
            $sentData['restaurantPic'] = $newRestaurant->restaurantPic;
        }

        $newRestaurant->categories()->sync($sentData['categories']);
        $newRestaurant = $newRestaurant->update($sentData);
        return redirect()->route('admin.restaurant.index')->with('edited' , 'The restaurant ' . '"' . $sentData['name'] . '"' . ' has been edited!');
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
    }
}
