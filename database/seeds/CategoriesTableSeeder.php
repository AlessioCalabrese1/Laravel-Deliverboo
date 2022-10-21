<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[
            [
                'name' => 'pizzeria',
                'color' => '#8DCEFF',
                'icon' => 'fa-pizza-slice'
            ],
            [
                'name' => 'fast food',
                'color' => '#E66947',
                'icon' => 'fa-burger'

            ],
            [
                'name' => 'italian',
                'color' => '#6E6676',
                'icon' => 'fa-wine-bottle'

            ],
            [
                'name' => 'bakery',
                'color' => '#F16BB2',
                'icon' => 'fa-cake-candles'

            ],
            [
                'name' => 'ice-cream shop',
                'color' => '#4465C0',
                'icon' => 'fa-ice-cream'

            ],
            [
                'name' => 'mexican',
                'color' => '#000000',
                'icon' => 'fa-pepper-hot'

            ],
            [
                'name' => 'indian',
                'color' => '#8D2B00',
                'icon' => 'fa-drumstick-bite'

            ],
            [
                'name' => 'greek',
                'color' => '#71989B',
                'icon' => 'fa-building-columns'

            ],
            [
                'name' => 'salads',
                'color' => '#527E4B',
                'icon' => 'fa-leaf'

            ],
            [
                'name' => 'spanish',
                'color' => '#EE3239',
                'icon' => 'fa-shrimp'

            ],
            [
                'name' => 'japanese',
                'color' => '#9D6AB9',
                'icon' => 'fa-fish-fins'

            ],
            [
                'name' => 'chinese',
                'color' => '#FE8D6F',
                'icon' => 'fa-bowl-rice'

            ],
        ];

        foreach ($categories as $category) {

            $newCategory = new Category();

            $newCategory->name = $category['name'];
            $newCategory->color = $category['color'];
            $newCategory->icon = $category['icon'];
            $newCategory->save();
        }
    }
}
