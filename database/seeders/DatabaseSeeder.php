<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'mobile'=>'0821234567',
                'is_admin' =>1,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@demo.com',
                'mobile'=>'0821234568',
                'is_admin'=>0,
                'password' => Hash::make('password'),
                ]
            ]
        );

        DB::table('categories')->insert(
            [
            [
                'main'=>'Consumables',
                'sub' =>'',
                'slug' =>'consumables',
            ],
            [
                'main'=>'Inks',
                'sub' =>'Dynamic',
                'slug' =>'inks-dynamic',
            ],
            [
                'main'=>'Inks',
                'sub' =>'Eternal',
                'slug' =>'inks-eternal',
            ],
            [
                'main'=>'Inks',
                'sub' =>'Kuro Sumi',
                'slug' =>'inks-kuro-sumi',
            ],
            [
                'main'=>'Inks',
                'sub' =>'World Famouse',
                'slug' =>'inks-world-famouse',
            ],
            [
                'main'=>'Needles',
                'sub' =>'Round Liner',
                'slug' =>'needles-round-liner',
            ],
            [
                'main'=>'Needles',
                'sub' =>'Round Shader',
                'slug' =>'needles-round-shader',
            ],
            [
                'main'=>'Needles',
                'sub' =>'Flat',
                'slug' =>'needles-flat',
            ],
            [
                'main'=>'Needles',
                'sub' =>'Magnum',
                'slug' =>'needles-magnum',
            ],
            ]
        );

        DB::table('products')->insert(
            [
            [
                'name'=>'Foot Switch Mini Pedal',
                'slug'=>'foot-switch-mini-pedal',
                'short_description'=>'Foot Switch Mini Pedal',
                'long_description'=>'Stainless steel Mini Pedal
                Perfect for any artist how loves effortless control
                This unique foots switch is very sensitive and has a no slip bottom to ensure total control.',
                'category_id'=>1,
                'sku'=>'1',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_01.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>100,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'O Rings Rubber Black',
                'slug'=>'o-rings-rubber-black',
                'short_description'=>'O Rings Rubber Black',
                'long_description'=>'When the bar that turns the tattoo machine on is pressed without an O-ring in place it rattles and doesn\'t make a consistent noise. Once you insert the rubber O-ring into the tattoo machine it changes how the machine runs. ',
                'category_id'=>1,
                'sku'=>'2',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_02.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>15,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Ink Cups Small 8mm',
                'slug'=>'ink-cups-small-8mm',
                'short_description'=>'Ink Cups Small 8mm',
                'long_description'=>'Ink cups are small plastic cups that are use to hold the ink while tattooing. ',
                'category_id'=>1,
                'sku'=>'3',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_03.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>20,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Pigment Mixer',
                'slug'=>'pigment-mixer',
                'short_description'=>'Pigment Mixer',
                'long_description'=>'Included: 1 x Ink Mixer.
                This product is for tattoo and cosmetic use.
                An efficient way to mix colors together by pressing the button.
                Available in White en Purple',
                'category_id'=>1,
                'sku'=>'4',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_04.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>120,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Clipcord Steel Socket',
                'slug'=>'clipcord-steel-socket',
                'short_description'=>'Clipcord Steel Socket',
                'long_description'=>'Clip cord length is 1.8m. This is a solid cord with steel socket. Widely used by professional artists. ',
                'category_id'=>1,
                'sku'=>'5',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_05.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>65,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Bloodsucker Ink Cup Holder',
                'slug'=>'bloodsucker-ink-cup-holder',
                'short_description'=>'Bloodsucker Ink Cup Holder',
                'long_description'=>'This Tattoo Ink Cups Holder Holds 8 Ink Cups. It is made of high quality material, unique design, beautiful appearance. The bloodsucker design is made with a lid top for when not using the holder. Suitable for artists.',
                'category_id'=>1,
                'sku'=>'6',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_06.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>50,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Tongue depressors',
                'slug'=>'tongue-depressors',
                'short_description'=>'Tongue depressors',
                'long_description'=>'Commonly used by artists to scoop out petroleum jelly instead of using their finger. This minimizes the risk of cross contamination.',
                'category_id'=>1,
                'sku'=>'7',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_07.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>60,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Grip Wrap Yellow',
                'slug'=>'grip-wrap-yellow',
                'short_description'=>'Grip Wrap Yellow',
                'long_description'=>'This bandage wrap can easily be wrapped around any type of grip, and offers a non-slip handle.
                These wraps are self adherent and require no tape.
                They are adhesive-free and will not get sticky or leave any residue.
                The bandage is soft, non-constricting, safe, will not slip and easy to work with.
                Width: 5.0CM
                Length: 4.5M ',
                'category_id'=>1,
                'sku'=>'8',
                'stock_status'=>'in-stock',
                'on_hand'=>40,
                'image'=>'digital_08.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>50,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Practice Skin Clear',
                'slug'=>'practice-skin-clear',
                'short_description'=>'Practice Skin Clear',
                'long_description'=>'A artificial skin that can be used to practice tattoos on.Clean 15x20',
                'category_id'=>1,
                'sku'=>'9',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_09.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>30,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Eternal Lime Green 1oz',
                'slug'=>'eternal-lime-green-1oz',
                'short_description'=>'Eternal Lime Green 1oz',
                'long_description'=>'A pure, cool green. Like the peel of a lime.',
                'category_id'=>2,
                'sku'=>'10',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_10.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>250,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Eternal Orange 1oz',
                'slug'=>'eternal-orange-1oz',
                'short_description'=>'Eternal Orange 1oz',
                'long_description'=>'A very strong primary orange',
                'category_id'=>2,
                'sku'=>'11',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_11.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>300,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'Eternal Sunflower 1oz',
                'slug'=>'eternal-sunflower-1oz',
                'short_description'=>'Eternal Sunflower 1oz',
                'long_description'=>'A rich, light yellow often used in cover-ups.',
                'category_id'=>2,
                'sku'=>'12',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_12.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>300,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1201RL',
                'slug'=>'1201rl',
                'short_description'=>'Round Liner 1201RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'13',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_13.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>90,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1203RL',
                'slug'=>'1203rl',
                'short_description'=>'Round Liner 1203RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'14',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_14.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>90,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1205RL',
                'slug'=>'1205rl',
                'short_description'=>'Round Liner 1205RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'15',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_15.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>90,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1207RL',
                'slug'=>'1207rl',
                'short_description'=>'Round Liner 1207RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'16',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_16.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>140,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1209RL',
                'slug'=>'1209rl',
                'short_description'=>'Round Liner 1209RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'17',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_17.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>140,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1211RL',
                'slug'=>'1211rl',
                'short_description'=>'Round Liner 1211RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'18',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_18.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>210,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1213RL',
                'slug'=>'1213rl',
                'short_description'=>'Round Liner 1213RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'19',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_19.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>210,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1215RL',
                'slug'=>'1215rl',
                'short_description'=>'Round Liner 1215RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'20',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_20.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>210,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1218RL',
                'slug'=>'1218rl',
                'short_description'=>'Round Liner 1218RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'21',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_21.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>290,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            [
                'name'=>'1221RL',
                'slug'=>'1221rl',
                'short_description'=>'Round Liner 1221RL',
                'long_description'=>' 1.Pre-made, sterilized, individually blister packaged and ready to use.
                2.Highest quality, sterile, per-soldered, ready made, on the bar tattoo needles.
                3.Made from ISO 9001 certified Stainless Steel.
                4.All needles have been thoroughly inspected for hooks and burs.
                5.Sterilized by E.O Gas. CE Marked and approved for use in Europe.
                6.Professional tattoo needle, professional medical equipment factory, color fast, uniform alignment
                7. 50 Needles per box.',
                'category_id'=>3,
                'sku'=>'22',
                'stock_status'=>'in-stock',
                'on_hand'=>50,
                'image'=>'digital_22.jpg',
                'images'=>'',
                'unit'=>'each',
                'regular_price'=>380,
                'special_price'=>null,
                'special_start'=>null,
                'special_end'=>null,
                'is_active'=>1
            ],
            ]
        );
    }
}
