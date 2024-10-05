<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,user',
            'password'=>'required','regex:/[a-zA-Z]/','regex:/[0-9]/','regex:/[@$!%*?&#]/','confirmed',
            'photo' => 'max:2048','mimes:png,jpg,jpeg',
        ];
    }
     // Custom error messages
     public function messages()
     {
         return [
             'name.required' => 'Please provide a name .',
             'email.unique' => 'This email is already taken.',
             'role.required' => 'The role cannot be empty.',
             'email.required' => 'An email address is required.',
             'email.email' => 'Please provide a valid email address.',
         ];
     }
}
