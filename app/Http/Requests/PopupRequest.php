<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopupRequest extends FormRequest
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
            'txtName'=>'required',
            'fImages'=>'image',
            'txturl' =>'required',


        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Please Enter Name Popup',
            'fImages.image' => 'This File Is Not Images',
            'txturl.required' => 'Please Enter ULR Popup'
        ];
    }
}
