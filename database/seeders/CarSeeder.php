<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Mf;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define some sample data for manufacturers if not present
        if (Mf::count() == 0) {
            Mf::create(['mf_name' => 'Toyota']);
            Mf::create(['mf_name' => 'Ford']);
            Mf::create(['mf_name' => 'BMW']);
            Mf::create(['mf_name' => 'Kia']);
            Mf::create(['mf_name' => 'Mercedes']);
        }

        $mfs = Mf::all();

        // Generate 100 cars using the factory
        Car::factory()->count(100)->make()->each(function ($car) use ($mfs) {
            $car->mf_id = $mfs->random()->id;
            $car->save();
        });
    }
}
