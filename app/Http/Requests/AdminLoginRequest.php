<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class AdminLoginRequest extends FormRequest
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
            'email' => ['required','string','max:100'],
            'password'=> ['required','string','max:100'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "email is required",
            'password'=>"password is required"
        ];
    }
}
