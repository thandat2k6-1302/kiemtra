<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mfs = ['HONDA', 'TOYOTA', 'MITSUBISHI', 'BMW', 'VINFAST', 'SUZUKI'];
        foreach ($mfs as $mf) {
            \App\Models\Mf::create(['mf_name' => $mf]);
        }
    }
}
