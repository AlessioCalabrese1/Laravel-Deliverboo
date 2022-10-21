<?php

use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dishes = [
            [
                'restaurant_id'=> 1,
                'name'=> 'big mac',
                'description'=> 'One of the most iconic hamburger of the history, you can find it all around the world!',
                'dishPic'=> 'https://images.dissapore.com/wp-content/uploads/2022/08/big-mac-chicken.jpg',
                'price'=> 4.53,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'big potatoes',
                'description'=> 'The perfect side of every meal!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 1.52,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'pizza margherita',
                'description'=> 'The best pizza you can find!',
                'dishPic'=> 'https://www.antoniopulcini.it/wp-content/uploads/2020/06/pizza-margherita-dica-alimentare-3.png',
                'price'=> 4.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'cuoppo',
                'description'=> 'Fried everything is better!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 3.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 3,
                'name'=> 'bucket of tenders',
                'description'=> 'Fried everything is better!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 5.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 3,
                'name'=> 'big potatoes',
                'description'=> 'The perfect side of every meal!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 2.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 4,
                'name'=> 'gyoza',
                'description'=> 'Gyoza are traditional Chinese dumplings that are extremely popular in East Asian countries, with their origins in China. They are also known as Jiaozi and are an essential part of traditional Chinese New Year celebrations.',
                'dishPic'=> 'https://media-assets.lacucinaitaliana.it/photos/61fd2d235455c3ec4f002f7c/4:3/w_800,h_600,c_limit/Gyoza-alla-piastra.jpg',
                'price'=> 4.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 5,
                'name'=> 'samosa',
                'description'=> 'A samosa or singara is a fried or baked pastry with a savory filling, including ingredients such as spiced potatoes, onions, and peas. It may take different forms, including triangular, cone, or half-moon shapes, depending on the region.',
                'dishPic'=> 'https://static.toiimg.com/thumb/55435214.cms?width=1200&height=900',
                'price'=> 3.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 6,
                'name'=> 'Gelato al pistacchio',
                'description'=> 'Pistachio ice cream or pistachio nut ice cream is an ice cream flavor made with pistachio nuts or flavoring. It is often distinctively green in color. ',
                'dishPic'=> 'https://primochef.it/wp-content/uploads/2018/06/SH_gelato_pistacchio.jpg.webp',
                'price'=> 2.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 7,
                'name'=> 'Gelato al pistacchio',
                'description'=> 'Moussaka is one of the best known Greek dishes – a baked casserole consisting of ground lamb meat and layers of sliced eggplant, covered with a thick layer of bechamel sauce that gets golden and crusty as it bakes. The lamb is sometimes replaced with beef, while the eggplants might be replaced with zucchini or potatoes.',
                'dishPic' => 'https://foodbloggermania.it/wp-content/uploads/2016/07/moussaka.jpg',
                'price'=> 5.00,
                'visible'=> 0,
            ],

        ];

        foreach ($dishes as $dish) {
        
            $newDish = new Dish();

            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->dishPic = $dish['dishPic'];
            $newDish->price = $dish['price'];
            $newDish->visible = $dish['visible'];

            $newDish->save();
        }
    }
}
