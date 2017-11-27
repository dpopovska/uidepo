<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveDesignRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'full_name'     => ['required', new \App\Rules\AlphaNumSpecialChar],
            'email_address' => ['required', 'email'],
            'categories_id' => ['required', 'exists:categories,id'],
            'description'   => ['required'],
            'zip_link'      => ['required', 'url'],
            'backlink'      => ['required', 'url']
        ];
    }
}
