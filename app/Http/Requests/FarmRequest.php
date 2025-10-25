<?php

namespace App\Http\Requests;


use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
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
            'recordNbr' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'x_lon' => ['required', new LongitudeRule],
            'y_lat' => ['required', new LatitudeRule],
            'wilaya_id' => 'required|exists:wilayas,id',
            'owner_id' => 'required|exists:users,id',
            'animal_types' => 'array',
            'animal_types.*' => 'exists:animal_types,id',
        ];
    }
}
