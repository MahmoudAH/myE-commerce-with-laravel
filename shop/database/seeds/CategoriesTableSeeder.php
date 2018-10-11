<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Laptops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Phones', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'TVs','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Cameras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Appliances', 'created_at' => $now, 'updated_at' => $now],
        ]);
   
}   
}
