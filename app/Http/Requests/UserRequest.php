<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'prof_id' => 'required|string|size:16|unique:users,prof_id',
            'NIN' => 'required|string|size:20|unique:users,NIN',
            'name' => 'required|string|min:3',
            'lastName' => 'required|string|min:3',
            'email' => 'required|string|email|max:255|unique:users,email',
            'commune_id' => 'required',
            'username' => 'required|string|min:3|unique:users,username',
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
