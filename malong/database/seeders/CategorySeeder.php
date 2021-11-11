<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['Tech','Health care','Hospitality', 'Customer Service', 'Marketing'])->map(function ($name) {
            return Category::create(['name' => $name,]);
        });
    }
}
