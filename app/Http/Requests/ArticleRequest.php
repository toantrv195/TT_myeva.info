<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'sltparent' =>'required',
            'txtTitle' => 'required',
            'txtIntro' => 'required',
            'txtContent' => 'required',
            'fImages'=>'image',
            'txturl' => 'required',
            'tag' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sltparent.required' => 'Please Choose Category',
            'txtTitle.required' => 'Please Enter Title',
            'txtIntro.required' => 'Please Enter Intro',
            'txtContent.required' => 'Please Enter content',
            'fImages.image' => 'This File Is Not Images',
            'txturl.required' => 'Please Enter Url',
            'tag.required' => 'Please Enter Tag'
        ];
    }
}
