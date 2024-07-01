<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Crop Farming', 'image' => null, 'parent_id' => null],
            ['name' => 'Cereals', 'image' => null, 'parent_id' => 1],
            ['name' => 'Vegetables', 'image' => null, 'parent_id' => 1],
            ['name' => 'Fruits', 'image' => null, 'parent_id' => 1],
            ['name' => 'Herbs and Spices', 'image' => null, 'parent_id' => 1],
            ['name' => 'Organic Farming', 'image' => null, 'parent_id' => 1],

            ['name' => 'Livestock Farming', 'image' => null, 'parent_id' => null],
            ['name' => 'Poultry', 'image' => null, 'parent_id' => 7],
            ['name' => 'Cattle', 'image' => null, 'parent_id' => 7],
            ['name' => 'Sheep and Goats', 'image' => null, 'parent_id' => 7],
            ['name' => 'Pigs', 'image' => null, 'parent_id' => 7],
            ['name' => 'Dairy Farming', 'image' => null, 'parent_id' => 7],

            ['name' => 'Agricultural Techniques', 'image' => null, 'parent_id' => null],
            ['name' => 'Sustainable Farming', 'image' => null, 'parent_id' => 13],
            ['name' => 'Precision Agriculture', 'image' => null, 'parent_id' => 13],
            ['name' => 'Irrigation Techniques', 'image' => null, 'parent_id' => 13],
            ['name' => 'Soil Management', 'image' => null, 'parent_id' => 13],
            ['name' => 'Pest Control', 'image' => null, 'parent_id' => 13],

            ['name' => 'Farm Management', 'image' => null, 'parent_id' => null],
            ['name' => 'Business Planning', 'image' => null, 'parent_id' => 19],
            ['name' => 'Financial Management', 'image' => null, 'parent_id' => 19],
            ['name' => 'Marketing Strategies', 'image' => null, 'parent_id' => 19],
            ['name' => 'Farm Equipment and Machinery', 'image' => null, 'parent_id' => 19],
            ['name' => 'Technology in Farming', 'image' => null, 'parent_id' => 19],

            ['name' => 'Weather and Climate', 'image' => null, 'parent_id' => null],
            ['name' => 'Weather Forecasts', 'image' => null, 'parent_id' => 25],
            ['name' => 'Climate Change Impacts', 'image' => null, 'parent_id' => 25],
            ['name' => 'Seasonal Farming Tips', 'image' => null, 'parent_id' => 25],
            ['name' => 'Disaster Preparedness', 'image' => null, 'parent_id' => 25],

            ['name' => 'Government and Policy', 'image' => null, 'parent_id' => null],
            ['name' => 'Agricultural Policies', 'image' => null, 'parent_id' => 30],
            ['name' => 'Subsidies and Grants', 'image' => null, 'parent_id' => 30],
            ['name' => 'Regulations and Compliance', 'image' => null, 'parent_id' => 30],

            ['name' => 'Farmers\' Health and Safety', 'image' => null, 'parent_id' => null],
            ['name' => 'Physical Health', 'image' => null, 'parent_id' => 34],
            ['name' => 'Mental Health', 'image' => null, 'parent_id' => 34],
            ['name' => 'Safety Practices', 'image' => null, 'parent_id' => 34],

            ['name' => 'Community and Networking', 'image' => null, 'parent_id' => null],
            ['name' => 'Farmers\' Markets', 'image' => null, 'parent_id' => 38],
            ['name' => 'Cooperative Farming', 'image' => null, 'parent_id' => 38],
            ['name' => 'Farmer Associations', 'image' => null, 'parent_id' => 38],
            ['name' => 'Events and Workshops', 'image' => null, 'parent_id' => 38],

            ['name' => 'Innovations and Research', 'image' => null, 'parent_id' => null],
            ['name' => 'New Crop Varieties', 'image' => null, 'parent_id' => 43],
            ['name' => 'Livestock Breeding Innovations', 'image' => null, 'parent_id' => 43],
            ['name' => 'Research Findings', 'image' => null, 'parent_id' => 43],
            ['name' => 'Case Studies', 'image' => null, 'parent_id' => 43],

            ['name' => 'Sustainable Practices', 'image' => null, 'parent_id' => null],
            ['name' => 'Organic Farming', 'image' => null, 'parent_id' => 48],
            ['name' => 'Agroforestry', 'image' => null, 'parent_id' => 48],
            ['name' => 'Conservation Agriculture', 'image' => null, 'parent_id' => 48],
            ['name' => 'Renewable Energy on Farms', 'image' => null, 'parent_id' => 48],

            ['name' => 'Home and Lifestyle', 'image' => null, 'parent_id' => null],
            ['name' => 'Farmhouse Living', 'image' => null, 'parent_id' => 53],
            ['name' => 'Recipes from the Farm', 'image' => null, 'parent_id' => 53],
            ['name' => 'DIY Projects', 'image' => null, 'parent_id' => 53],
            ['name' => 'Family Activities on the Farm', 'image' => null, 'parent_id' => 53],

            ['name' => 'Youth in Agriculture', 'image' => null, 'parent_id' => null],
            ['name' => 'Youth Programs', 'image' => null, 'parent_id' => 58],
            ['name' => 'Education and Training', 'image' => null, 'parent_id' => 58],
            ['name' => 'Success Stories', 'image' => null, 'parent_id' => 58],
        ];

        DB::table('blog_categories')->insert($categories);
    }
}
