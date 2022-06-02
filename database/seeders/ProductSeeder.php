<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            // Burger category
            [
                'name'              => 'Burger Overload',
                'slug'              => 'burger-overload',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '53.98',
                'stock_status'      => 'instock',
                'category_id'       => 1, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 35,
                'image'             => 'burger1.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Burger Egg',
                'slug'              => 'burger-egg',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '34.23',
                'stock_status'      => 'instock',
                'category_id'       => 1, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 20,
                'image'             => 'burger2.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

            // Chicken category
            [
                'name'              => 'Chicken Nuggets',
                'slug'              => 'chicken-nuggets',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '78.65',
                'stock_status'      => 'instock',
                'category_id'       => 2, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 14,
                'image'             => 'chicken1.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Lechon Manok',
                'slug'              => 'lechon-manok',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '140.23',
                'stock_status'      => 'instock',
                'category_id'       => 2, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 8,
                'image'             => 'chicken2.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Fried Chicken',
                'slug'              => 'fried-chicken',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '35.99',
                'stock_status'      => 'instock',
                'category_id'       => 2, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 14,
                'image'             => 'chicken3.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

            // Desserts category
            [
                'name'              => 'Choco Cake',
                'slug'              => 'choco-cake',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '25.00',
                'stock_status'      => 'instock',
                'category_id'       => 3, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 27,
                'image'             => 'desert1.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Hot Cakes',
                'slug'              => 'hot-cakes',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '5.00',
                'stock_status'      => 'instock',
                'category_id'       => 3, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 13,
                'image'             => 'desert2.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Waffles',
                'slug'              => 'waffles',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '15.50',
                'stock_status'      => 'instock',
                'category_id'       => 3, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 17,
                'image'             => 'desert3.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Pancake',
                'slug'              => 'pancake',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '12.75',
                'stock_status'      => 'instock',
                'category_id'       => 3, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 24,
                'image'             => 'desert4.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Ice Creamy Blue',
                'slug'              => 'ice-creamy-blue',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '17.79',
                'stock_status'      => 'instock',
                'category_id'       => 3, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 14,
                'image'             => 'desert5.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

            // Drinks category
            [
                'name'              => 'Orange Juice',
                'slug'              => '0range-juice',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '14.00',
                'stock_status'      => 'instock',
                'category_id'       => 4, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 15,
                'image'             => 'drink1.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Straw Berry Juice',
                'slug'              => 'straw-berry-juice',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '19.00',
                'stock_status'      => 'instock',
                'category_id'       => 4, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 32,
                'image'             => 'drink2.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Lemonade',
                'slug'              => 'lemonade',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '15.00',
                'stock_status'      => 'instock',
                'category_id'       => 4, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 21,
                'image'             => 'drink3.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            // Drinks category
            [
                'name'              => 'Pizza Salami',
                'slug'              => 'pizza-salami',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '203.00',
                'stock_status'      => 'instock',
                'category_id'       => 4, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 8,
                'image'             => 'pizza1.png',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Pizza Overload',
                'slug'              => 'pizza-overload',
                'short_description' => 'Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Excepturi, Accusantium.',
                'description'       => "<p>The Basic Tee 6-Pack Allows You To Fully Express Your Vibrant Personality With Three Grayscale Options. Feeling Adventurous? Put On A Heather Gray Tee. Want To Be A Trendsetter? Try Our Exclusive Colorway: 'Black'. Need To Add An Extra Pop Of Color To Your Outfit? Our White Tee Has You Covered.</p>
                                        <p><strong>Highlights</strong></p>
                                        <p>- Hand Cut And Sewn Locally</p>
                                        <p>- Dyed With Our Proprietary Colors</p>
                                        <p>- Pre-Washed &amp; Pre-Shrunk</p>
                                        <p>- Ultra-Soft 100% Cotton</p>
                                        <p><strong>Details</strong></p>
                                        <p>The 6-Pack Includes Two Black, Two White, And Two Heather Gray Basic Tees. Sign Up For Our Subscription Service And Be The First To Get New, Exciting Colors, Like Our Upcoming 'Charcoal Gray' Limited Release.</p>",
                'regulary_price'    => '210.00',
                'stock_status'      => 'instock',
                'category_id'       => 4, // 1=Burger , 2=Chicken, 3=Desserts, 4=Drinks, 5=Pizza,
                'quantity'          => 11,
                'image'             => 'pizza2.jpg',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
