<?php

namespace App\Http\Controllers;

use App\Services\ShortUrlService;
use App\Services\RedirectStatisticService;

class Redirect extends Controller
{
    function execute(
            string $urlKey,
            ShortUrlService $shortUrlSvc,
            RedirectStatisticService $redirectStatisticSvc
    ) {
        try {
            $shortUrl = $shortUrlSvc->resolveShortUrlByKey($urlKey);
            $redirectStatisticSvc->incrementRedirectCounter(
                    (int)$shortUrl->id
                );
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->to($shortUrl->orig_url);
    }
}
