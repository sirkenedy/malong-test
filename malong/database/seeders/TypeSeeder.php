<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['Full-time','Temporary','Contract', 'Permanent', 'Internship', 'Volunteer '])->map(function ($name) {
            return Type::create(['name' => $name,]);
        });
    }
}
