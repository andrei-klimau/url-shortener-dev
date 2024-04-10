<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShortUrlService
{
    public function resolveShortUrlByKey(string $urlKey)
    {
        $validator = Validator::make(['urlKey' => $urlKey], [
            'urlKey' => 'required|alpha_num:ascii'
        ]);
        if ($validator->fails()) {
            throw new \Exception('Invalid URL key');
        }

        $shortUrl = DB::table('short_urls')
                ->whereRaw('`short_url_key` = ?', $urlKey)
                ->first();
        
        if ($shortUrl === null) {
            throw new ModelNotFoundException();
        }
        
        return $shortUrl;
    }
}