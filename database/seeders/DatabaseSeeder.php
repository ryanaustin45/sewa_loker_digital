<?php

namespace Database\Seeders;

use App\Models\Loker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $i = 1;
        while ($i <= 20) {
            Loker::create([
                'kode_loker' => Str::random(10),
                'lokasi' => Str::random(10),
                'harga_per_hari' => 100000,
                'status' => 'tersedia',
                'ukuran' => 'kecil',
            ]);
            $i++;
        }
    }
}
