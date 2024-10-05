<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,user',
            'password'=>'required','regex:/[a-zA-Z]/','regex:/[0-9]/','regex:/[@$!%*?&#]/',
            'photo' => 'required|max:2048|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'password doesn\'t match the conditions',
            'email.required'=>'email is required ',

        ];
    }
}
