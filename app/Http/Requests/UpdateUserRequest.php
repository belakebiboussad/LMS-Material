<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    /*
    public function rules(): array
    {

        return [
            'prof_id'=> 'required|string|size:16|unique:users,prof_id,'.$this->user->id,
            'NIN' => 'required|string|size:20|:unique:users, NIN,'.$this->user->id,
            'name' => 'required|string|min:3',
            'lastName' => 'required|string|min:3',
            'email' => 'required|string|email|max:255|unique:users,email,' .  $this->user->id,
            'commune_id' => 'required|string|max:255',
            'username' => ['required','string','max:255',Rule::unique('users','username')->ignore($this->user->id)],//'role' => 'required|string|max:255',
            'role' => ['required','string','max:255',
                Rule::unique('users','role')->ignore($this->user->id),
            ],
            'role'=>  function ($attribute, $value, $fail) {
                if (request('role' == 'admin') && User::where('role', 'admin')->exists()) {
                    $fail('Only one admin user is allowed.');
                }
            },
            
        ];
    }
    */
    public function rules() {
        return [

                'prof_id'=> [
                    'required','string','size:16',Rule::unique((new User)->getTable(),'prof_id')->ignore($this->route()->user->id ?? null)
                ],
                'NIN'=> [
                    'required','string','size:20',Rule::unique((new User)->getTable(),'NIN')->ignore($this->route()->user->id ?? null)
                ],
                'name' => ['required', 'min:3'],
                'lastName' => ['required', 'min:3'],
                'email' => [
                    'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
                ],
                'commune_id' => ['required'],    
                'username' => [
                    'required', 'max:255', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
                ],
                'password' => [
                        $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
                ],
                'role' => [
                    'required', Rule::exists('roles', 'name'), 
                ]
             ];
                
    }
}
