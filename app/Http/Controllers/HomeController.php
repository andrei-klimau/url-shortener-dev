<?php

namespace App\Http\Controllers;

use App\Interfaces\UniqueIdGeneratorInterface;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(UniqueIdGeneratorInterface $generator)
    {
        $userId = Auth::id();
        $shortUrKey = $generator->getUniqueId();
        $totalLinks = ShortUrl::where('user_id', $userId)->count();
        $lastUrl = ShortUrl::where('user_id', $userId)
            ->orderBy('updated_at', 'DESC')->first();

        return view('home', compact('shortUrKey', 'totalLinks',
            'lastUrl'));
    }
}
