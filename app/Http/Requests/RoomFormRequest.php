<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoomFormRequest extends Request
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
            'no' => 'required|max:255|unique:rooms,no,'.$this->id,
            'floor' => 'required|max:255',
            'department' => 'required|max:255',
        ];
    }
}
