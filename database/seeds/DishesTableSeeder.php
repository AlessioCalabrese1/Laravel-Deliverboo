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

            // Mc Donald's
            [
                'restaurant_id'=> 1,
                'name'=> 'Big Mac',
                'description'=> 'One of the most iconic hamburger of the history, you can find it all around the world!',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741250789748766/BigMac.jpg',
                'price'=> 4.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'big potatoes',
                'description'=> 'The perfect side of every meal!',
                'dishPic'=> 'https://www.mcdonalds.it/sites/default/files/products/patate-regolari_isolated_0.png',
                'price'=> 1.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'Cheeseburger',
                'description'=> 'Our simple, classic cheeseburger begins with a 100% pure beef burger seasoned with just a pinch of salt and pepper. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741251469217862/Cheeseburger.jpg',
                'price'=> 2.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'World Famous Fries',
                'description'=> 'McDonald\'s World Famous Fries® are made with premium potatoes such as the Russet Burbank and the Shepody. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741251263701032/FrenchFries.jpg',
                'price'=> 1.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'Chicken McNuggets',
                'description'=> 'Chicken McNuggets® are made with all white meat chicken and no artificial colors, flavors, or preservatives. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741251037220884/Chicken_McNuggets.jpg',
                'price'=> 5.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 1,
                'name'=> 'Diet Coke',
                'description'=> 'Try an icy cold Diet Coke®, with zero calories. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741250559057980/DietCoke.jpg',
                'price'=> 2.00,
                'visible'=> 0,
            ],




            // Domino's Pizza

            [
                'restaurant_id'=> 2,
                'name'=> 'Pepperoni',
                'description'=> 'Lots of pepperoni & mozzarella',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741209731702845/Pepperoni.jpg',
                'price'=> 5.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'GODFATHER',
                'description'=> 'Pepperoni, tomato, mushrooms, black olives & oregano on a tomato & garlic sauce base',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741209463259176/Buffalo-wing-Fajita-Meat-Pepperoni.jpg',
                'price'=> 4.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'Hawaiian Ham Pepperoni',
                'description'=> 'Pepperoni, tomato, mushrooms, black olives & oregano on a tomato & garlic sauce base',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741209152892968/Hawaiian_Ham_PepperoniMeat.jpg',
                'price'=> 6.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'Bacon Pepperoni Sausage',
                'description'=> 'The Meat Lovers Dream with perfectly charred meats over a coal fire pizza. 12',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741208817356811/Bacon_pepperoni_sausage.jpg',
                'price'=> 5.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'Garlic Bread',
                'description'=> 'Cheesy Garlic Bread Pizza ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741208465031248/garlic_bread.jpg',
                'price'=> 5.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 2,
                'name'=> 'Cheese',
                'description'=> 'The most popular cheeses used in the preparation of pizza are mozzarella (accounting for about 30%), provolone, cheddar and Parmesan.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741208167239740/Cheese.jpg',
                'price'=> 5.00,
                'visible'=> 0,
            ],


            // Qdoba

            [
                'restaurant_id'=> 3,
                'name'=> 'Taco Salad',
                'description'=> 'Dig into crisp lettuce, seasoned black bean corn salsa and a fat free Picante Ranch Dressing. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741175111913472/Taco_Salad.jpg',
                'price'=> 8.50,
                'visible'=> 0,
            ],

            [
                'restaurant_id'=> 3,
                'name'=> 'Nachos',
                'description'=> 'Mexican food consisting of fried tortilla chips or totopos covered with melted cheese or cheese sauce, as well as a variety of other toppings',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741174809919488/Nachos.jpg',
                'price'=> 8.50,
                'visible'=> 0,
            ],

            [
                'restaurant_id'=> 3,
                'name'=> 'Quesadilla',
                'description'=> 'Quesadillas are available with your choice of protein, melted cheese, salsas, sauces, and toppings.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741174558269492/Quesadilla.jpg',
                'price'=> 8.50,
                'visible'=> 0,
            ],

            [
                'restaurant_id'=> 3,
                'name'=> 'Taco Salad Vegetarian',
                'description'=> 'This vegetarian taco salad is a healthy Tex-Mex upgrade! Black beans, veggies, crushed chips, and fresh cilantro lime dressing make it pop!',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741174281441290/Taco_salad-Vegetarian.jpg',
                'price'=> 7.00,
                'visible'=> 0,
            ],

            [
                'restaurant_id'=> 3,
                'name'=> 'Burrito',
                'description'=> 'The secret to this chicken burrito filling is a simple mix of grilled chicken, cheese, pico de gallo, rice, and beans.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741174050770974/burrito.jpg',
                'price'=> 8.00,
                'visible'=> 0,
            ],

            [
                'restaurant_id'=> 3,
                'name'=> 'Belgian Waffle',
                'description'=> 'Mix together the dry waffle ingredients. Add the eggs, milk, oil, and vanilla. Mix until batter forms.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741173807493171/Belgian_waffle.jpg',
                'price'=> 5.00,
                'visible'=> 0,
            ],


            // Tim Hortons

            [
                'restaurant_id'=> 4,
                'name'=> 'Sandwich',
                'description'=> 'Artisan sliced whole wheat bread, filled with bacon, egg and cheese.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741135249260564/baconeggcheeseSandwich.jpg',
                'price'=> 6.00,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 4,
                'name'=> 'Biscuits',
                'description'=> 'Simplicity, tradition and goodness of an ancient recipe make the original Amaretti di Saronno a unique biscuit. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741134993391626/donutsamaretti.jpg',
                'price'=> 2.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 4,
                'name'=> 'Smoothie',
                'description'=> 'A refreshingly cold beverage, blended with real fruit puree and our deliciously creamy Greek yogurt.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741134720782396/strawberrybananaSmoothie.jpg',
                'price'=> 2.50,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 4,
                'name'=> 'Bagel',
                'description'=> 'Regular or toasted, buttered or slathered in cream cheese, everyone loves a bagel.',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741134376833084/baconeggcheeseBagel.jpg',
                'price'=>4.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 4,
                'name'=> 'Chocolate Croissant',
                'description'=> 'A buttery and soft pastry with a crispy surface and chocolate filling. ',
                'dishPic'=> 'https://media.discordapp.net/attachments/1027584701415833620/1034741133609283594/chocolate_croissant.jpg',
                'price'=> 3.00,
                'visible'=> 1,
            ],

            [
                'restaurant_id'=> 4,
                'name'=> 'Iced Capp',
                'description'=> '1%, 2% or chocolate, whichever way you order it, our Iced Capp is a creamy solution to summer heat. ',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034741134104219669/cappuccino.jpg',
                'price'=> 3.00,
                'visible'=> 0,
            ],



            // KFC

            [
                'restaurant_id'=> 5,
                'name'=> 'Double Chicken Bbq',
                'description'=> 'Double chicken, double swiss cheese, bacon, crispy onions, smoky BBQ sauce and Dijon mayo. ',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034740955347165325/Mixed_FriedChicken.jpg',
                'price'=> 7.50,
                'visible'=> 0,
            ],
            [
                'restaurant_id'=> 5,
                'name'=> 'Fried Chicken',
                'description'=> ' When you are ready to fry the chicken, break an egg and separate the egg white to a bowl.',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034740955573653504/Fried_chicken.jpg',
                'price'=> 7.30,
                'visible'=> 0,
            ],

                    [
                'restaurant_id'=> 5,
                'name'=> 'Chicken Nuggets',
                'description'=> 'he BEST crispy baked chicken nuggets! This healthy chicken nugget recipe takes 30 minutes to make for an easy, kid-friendly dinner.',
                'dishPic' => 'https://cdn.discordapp.com/attachments/1027584701415833620/1034737326162727002/mcchicken--hero-isolated.png',
                'price'=> 3.30,
                'visible'=> 0,
            ],

                    [
                'restaurant_id'=> 5,
                'name'=> 'French Fries',
                'description'=> 'These homemade french fries are potatoes that are cut into sticks and deep fried until golden brown, then sprinkled with seasonings.',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034740956081180682/KFCFrenchFries.jpg',
                'price'=> 3.30,
                'visible'=> 0,
            ],

                    [
                'restaurant_id'=> 5,
                'name'=> 'Slider Sandwich',
                'description'=> 'Sliders are the little sandwiches that shine as a starter or main course.',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034740956341211146/slidersandwich.jpg',
                'price'=> 5.50,
                'visible'=> 0,
            ],

                    [
                'restaurant_id'=> 5,
                'name'=> 'Chicken Sandwich Cheesburger',
                'description'=> 'Marinated boneless chicken breast with American, swiss, pepperjack or cheddar cheese.',
                'dishPic' => 'https://media.discordapp.net/attachments/1027584701415833620/1034740956630626324/Chicken-sandwich-Cheeseburger.jpg',
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
