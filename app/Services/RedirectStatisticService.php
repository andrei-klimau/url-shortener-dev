<?php

namespace App\Services;

use App\Models\RedirectStatistic;

class RedirectStatisticService
{
    public function incrementRedirectCounter(int $shortUrlId)
    {
        $statistic = RedirectStatistic::where('short_url_id', $shortUrlId)
            ->first();
        if ($statistic === null) {
            RedirectStatistic::create(['short_url_id' => $shortUrlId]);
        } else {
            $statistic->increment('redirect_count');
        }
    }
}
