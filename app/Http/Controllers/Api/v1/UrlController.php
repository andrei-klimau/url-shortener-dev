<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use App\Http\Resources\ShortUrl as ShortUrlResource;
use App\Http\Resources\ShortUrlCollection;
use App\Models\ShortUrl;

class UrlController extends Controller
{
    public function index()
    {
        return new ShortUrlCollection(ShortUrl::with('redirectStatistic')
            ->paginate(1000));
    }

    public function show(string $id)
    {
        return new ShortUrlResource(ShortUrl::with('redirectStatistic')
            ->findOrFail($id));
    }

    public function store(ShortUrlRequest $request)
    {
        $validatedData = $request->validated();
        $shortUrl = ShortUrl::create($validatedData);

        return new ShortUrlResource($shortUrl);
    }

    public function update(ShortUrlRequest $request, string $id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        $validatedData = $request->validated();
        $shortUrl->update($validatedData);

        return new ShortUrlResource($shortUrl);
    }

    public function destroy(string $id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        $shortUrl->delete();

        return response()->json(true);
    }
}
