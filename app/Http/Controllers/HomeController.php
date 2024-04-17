<?php

namespace App\Http\Controllers;

use App\Interfaces\UniqueIdGeneratorInterface;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    public function index(UniqueIdGeneratorInterface $generator)
    {
        $userId = Auth::id();
        $uniqueIdMinLen = (int) Config::get('uniqueid.min_length');
        $uniqueIdMaxLen = (int) Config::get('uniqueid.max_length');
        $shortUrKey = $generator->getUniqueId(
            $uniqueIdMinLen,
            $uniqueIdMaxLen
        );
        $totalLinks = ShortUrl::where('user_id', $userId)->count();
        $lastCreatedUrl = ShortUrl::where('user_id', $userId)
            ->orderBy('updated_at', 'DESC')->first();

        return view('home', compact('shortUrKey', 'totalLinks',
            'lastCreatedUrl', 'uniqueIdMinLen', 'uniqueIdMaxLen'));
    }
}
