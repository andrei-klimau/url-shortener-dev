<?php

namespace Database\Seeders;

use App\Models\RedirectStatistic;
use App\Models\ShortUrl;
use Illuminate\Database\Seeder;

class ShortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShortUrl::factory()
            ->count(50)
            ->has(RedirectStatistic::factory()->count(3))
            ->create();
    }
}
