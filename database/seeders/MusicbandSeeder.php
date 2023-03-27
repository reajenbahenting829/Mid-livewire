<?php

namespace Database\Seeders;

use App\Models\Musicband;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusicbandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Musicband::factory(10)->create();
    }
}
