<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['Remote','Part Remote','On-Premise'])->map(function ($name) {
            return Condition::create(['name' => $name]);
        });
    }
}
