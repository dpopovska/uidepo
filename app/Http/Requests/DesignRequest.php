<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignRequest extends FormRequest
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
        $rules = [
            'title'                 => ['required', 'regex:/[^<>]+$/'], 
            'categories_id'         => ['required', 'exists:categories,id'],
            'description'           => ['required'],
            'featured_thumbnail'    => ['image', 'dimensions:width=450,height=330'],
            'regular_thumbnail'     => ['image', 'dimensions:width=375,height=275'],
            'preview_img.*'         => ['image', 'dimensions:min_width=1000,min_height=750'],
            'help_document'         => ['mimes:jpeg,bmp,png,pdf,doc,docx,txt,xlsx,xls,xlt,xltx,ppsx,pps,pptx,ppt']
        ];

        switch ($this->method()) {
            case 'POST':
                array_merge($rules, ['preview_img' => ['required']]);
                array_merge($rules['featured_thumbnail'], ['required']);
                array_merge($rules['regular_thumbnail'], ['required']);
                return $rules;
            case 'PATCH':
                return $rules;
            default: break;
        }
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [];
        if(request()->has('preview_img'))
        {
            foreach (request()->preview_img as $key => $value){
                $messages['preview_img.'. $key .'.image'] = 'The preview image '. $key .' must be an image.';
                $messages['preview_img.'. $key .'.dimensions'] = 'The preview image '. $key .' has invalid image dimensions.';
            }
        }
        return $messages;
    }
}
