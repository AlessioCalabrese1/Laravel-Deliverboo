<?php

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class CategoryRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  /*       $restaurants=Restaurant::all();
        $category=Category::findOrFail(1);
        $restaurants[0]->categories()->attach($category->id);

        $category=Category::findOrFail(2);
        $restaurants[1]->categories()->attach($category->id);

        $category=Category::findOrFail(3);
        $restaurants[2]->categories()->attach($category->id);
 */
   /*      $categories=Category::all();


        foreach($restaurants as $restaurant){

            $randomCategories = Category::inRandomOrder()->limit(rand(1, 5))->get();
            foreach($randomCategories as $randomCategory){
                $restaurant->categories()->attach($randomCategory->id);
            }
        } */

/*         $categories=Category::all();
        $restaurant=Restaurant::findOrFail(1);
        $categories[0]->restaurants()->attach($restaurant->id);

        $restaurant=Category::findOrFail(2);
        $categories[1]->restaurants()->attach($restaurant->id);

        $restaurant=Category::findOrFail(3);
        $categories[2]->restaurants()->attach($restaurant->id); */

        $restaurants=Restaurant::all();
        $categories=Category::all();

        $restaurants[0]->categories()->attach($categories[1]);

        $restaurants[1]->categories()->attach($categories[0]);
        
        $restaurants[2]->categories()->attach($categories[1]);

        $restaurants[3]->categories()->attach($categories[2]);

        $restaurants[4]->categories()->attach($categories[7]);
        
        $restaurants[5]->categories()->attach($categories[5]);

        $restaurants[6]->categories()->attach($categories[8]);
       
    }
}
