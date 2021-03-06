<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "url" => ['required', 'url'],
            "creator_identify" => ['required'],
            "description" => ['nullable', 'min:3', 'max:200']
        ];
    }
}
