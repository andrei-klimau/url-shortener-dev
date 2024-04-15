<?php

namespace App\Http\Controllers;

use App\Services\RedirectStatisticService;
use App\Services\ShortUrlService;

class RedirectController extends Controller
{
    public function __invoke(
        string $urlKey,
        ShortUrlService $shortUrlSvc,
        RedirectStatisticService $redirectStatisticSvc
    ) {
        try {
            $shortUrl = $shortUrlSvc->resolveShortUrlByKey($urlKey);
            $redirectStatisticSvc->incrementRedirectCounter(
                (int) $shortUrl->id
            );
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->to($shortUrl->orig_url);
    }
}
