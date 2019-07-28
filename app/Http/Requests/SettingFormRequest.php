<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingFormRequest extends Request
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
            'name' => 'required|max:150',
            'address' => 'required',
            'town' => 'required|max:255',
            'county' => 'required|max:255',
            'post_code' => 'required',
            'country' => 'required|max:100',
            'telephone' => 'required|max:100',
            'email' => 'required',
            'website' => 'required|max:200',            
            'facebook' => 'required|max:200',
            'twitter' => 'required|max:200',
            'instagram' => 'required|max:200',
            'youtube' => 'required|max:200',
        ];
    }
}
