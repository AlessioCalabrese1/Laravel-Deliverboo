<?php

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $restaurants=[
            [
                'user_id' => 1,
                'name'=> 'McDonald\'s',
                'address'=> 'Via Roma 27',
                'open'=> '07:00',
                'close'=>'00:00',
                'restaurantPic'=> 'https://s41230.pcdn.co/wp-content/uploads/2021/12/McDonalds-Net-Zero-restaurant-HEADER.jpg',

            ],

            [
                'user_id' => 2,
                'name'=> 'Da Michele',
                'address'=> 'Via Napoli 12',
                'open'=> '11:00',
                'close'=>'23:00',
                'restaurantPic'=> 'https://media-cdn.tripadvisor.com/media/photo-s/0f/4c/de/1d/da-michele.jpg',

            ],

            [
                'user_id' => 3,
                'name'=> 'Los Pollos Hermanos',
                'address'=> 'Via Albuquerque 66',
                'open'=> '00:00',
                'close'=>'23:59',
                'restaurantPic'=> 'https://static.independent.co.uk/s3fs-public/thumbnails/image/2015/05/01/15/lospolloshermanos.jpg?width=1200',

            ],

        ];

        foreach ($restaurants as $restaurant) {

            $newRestaurant = new Restaurant();

            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->open = $restaurant['open'];
            $newRestaurant->close = $restaurant['close'];
            $newRestaurant->restaurantPic = $restaurant['restaurantPic'];

            $newRestaurant->save();
        };
    }
}