<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request
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
                 
            'user_name' => 'required|string|unique:users,user_name,'.$this->id,
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'age' => 'required',
            'telephone' => 'required|max:50',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'address' => 'required',            
            'street' => 'required|max:255',
            'town' => 'required|max:255',
            'country' => 'required|max:255',
            'other' => 'required',
            'role' => 'required',
            'department' => 'required|max:255',
            'image' => 'mimes:jpeg,bmp,png',
        ];
    }
}
