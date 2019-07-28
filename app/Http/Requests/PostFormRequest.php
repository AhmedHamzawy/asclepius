<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request
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
            'url' => 'required|max:255|unique:posts,url,'.$this->id,
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required|max:255',
            'blog' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
        ];
    }
}
