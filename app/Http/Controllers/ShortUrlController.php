<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortUrlRequest;
use App\Interfaces\UniqueIdGeneratorInterface;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ShortUrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ToDo: Add a 1-to-1 relationship to the statistics table
        $userId = Auth::id();
        $shortUrls = ShortUrl::where('user_id', $userId)
            ->with('redirectStatistic')
            ->paginate(15);

        return view('urls.index', compact('shortUrls'));
    }

    public function create(UniqueIdGeneratorInterface $generator)
    {
        $userId = Auth::id();
        $shortUrKey = $generator->getUniqueId();

        return view('urls.create', compact('userId', 'shortUrKey'));
    }

    public function store(ShortUrlRequest $request)
    {
        $validatedData = $request->validated();
        ShortUrl::create($validatedData);

        return redirect()
            ->route('urls.index')
            ->with('success', 'Short Url created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        if (! Gate::allows('update', $shortUrl)) {
            abort(403);
        }

        return view('urls.edit', compact('shortUrl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShortUrlRequest $request, string $id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        if (! Gate::allows('update', $shortUrl)) {
            abort(403);
        }

        $validatedData = $request->validated();
        $shortUrl->update($validatedData);

        return redirect()
            ->route('urls.index')
            ->with('success', 'Short Url updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        if (! Gate::allows('delete', $shortUrl)) {
            abort(403);
        }

        $shortUrl->delete();

        return redirect()
            ->route('urls.index')
            ->with('success', 'Short Url deleted successfully.');
    }
}
