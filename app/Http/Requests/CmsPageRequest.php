<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsPageRequest extends FormRequest
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
            'title' => ['required'],
        'meta_content' => ['required'],
        'meta_description' => ['required'],
        'meta_keyword' => ['required'],
        'page_body' => ['required'],
        ];
    }
}
