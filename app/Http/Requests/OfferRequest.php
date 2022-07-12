<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar' => ['required','string','max:100'],
            'name_en'=> ['required','string','max:100'],
            'price'=> ['required','string','max:5'],
            'photo'=> ['required','image'],
            'details_en'=>['required','string','max:150'],
            'details_ar'=>['required','string','max:150']
        ];

    }
    public function messages(){
        return [
            'name_ar.required' => __('check.name required'),
            'name_en.required' => __('check.name required'),
            'price.required' => __('check.price required'),
            'details_en.required' => __('check.details required'),
            'details_ar.required' => __('check.details required'),
            'photo.required' => 'يجب وضع الصورة'
        ];
    }
}
