<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
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
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'test_id' => 'required|numeric',
            'question' => 'required',
            'image' => 'sometimes|required|mimes:jpeg,png',
            'answer1' => 'required',            
            'answer2' => 'required',            
            'answer3' => 'required',            
            'answer4' => 'required',            
            'correct_answer' => 'required|numeric',           
        ];
    }
}
