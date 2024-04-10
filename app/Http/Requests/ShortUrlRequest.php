<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'orig_url' => 'required|url:http,https',
            'short_url_key' => [
                'required',
                'min:8', 
                'max:16', 
                'alpha_num:ascii',
                Rule::unique('short_urls')->ignore($this->request->get('id'))
                ],
            'name' => 'required|max:255'
        ];
    }
}
