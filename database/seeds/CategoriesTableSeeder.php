<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Mock-ups', 'UI Kits', 'Icons', 'Websites', 'Mobile', 'Fonts'];

    	foreach($categories as $category){
    		DB::table('categories')->insert([
				'name' => $category, 
				'link' => str_replace(' ', '-', strtolower($category)),
				'status' => 1,
				'created_at' => Carbon::now()->toDateTimeString(), 
				'updated_at' => Carbon::now()->toDateTimeString()
			]);
    	}
    }
}
