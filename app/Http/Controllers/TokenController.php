<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = Auth::user()->tokens;

        return view('tokens.index', compact('tokens'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'token_name' => 'required|max:255',
        ]);

        $token = $request->user()->createToken(
            $validatedData['token_name'], ['url-manage']
        );

        return ['token' => $token->plainTextToken];
    }

    public function destroy(string $tokenId)
    {
        Auth::user()->tokens()->where('id', $tokenId)->delete();

        return redirect()
            ->route('tokens.index')
            ->with('success', __('token.deleted_successfully'));
    }
}
