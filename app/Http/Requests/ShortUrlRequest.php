<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class ShortUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule
     *   |array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:App\Models\User,id',
            'orig_url' => 'required|url:http,https',
            'short_url_key' => [
                'required',
                sprintf('min:%u', Config::get('uniqueid.min_length')),
                sprintf('max:%u', Config::get('uniqueid.max_length')),
                'alpha_num:ascii',
                Rule::unique('short_urls')->ignore($this->request->get('id')),
            ],
            'name' => 'required|max:255',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->mergeIfMissing([
            'user_id' => Auth::id(),
        ]);
    }
}
