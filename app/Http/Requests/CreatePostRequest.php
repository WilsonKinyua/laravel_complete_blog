<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
           
            "title"=>"required|unique:posts",
            "category_id"=>"required",
            "published_at"=>"required",
            "tag_id"=>"required",
            "description"=>"required",
            "content"=>"required",
            "photo_id"=>"required",

        ];
    }
}
