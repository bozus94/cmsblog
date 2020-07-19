<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'user_id' => 'required|integer', 
            'category_id' => 'required|integer',
            'name' => 'required',
            'slug' => 'required|unique:tags,slug',
            'excerpt' => 'required',
            'body' => 'required',
            'status' => 'required|in:DRAFT,PUBLISHED',
            'tags' => 'required|array'
        ];
    }
}
