<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'contact_number' => 'required|digits:10',
            'postcode' => 'required',
            'gender' => 'required|in:Male,Female,other',
            'hobbies' => 'required',
            'hobbies.*' => 'string',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
            'files' => '',
            'state_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
