<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageFormRequest extends Request
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
            'to' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ];
    }
}
