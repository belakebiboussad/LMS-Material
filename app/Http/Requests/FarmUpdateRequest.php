<?php

namespace App\Http\Requests;
use App\Models\Farm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class FarmUpdateRequest extends FormRequest
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
            'recordNbr' => ['required','string','max:10',Rule::unique('farms')->ignore($this->farm->id)],
            'name' => 'required|string|max:255',
            'owner_id' => 'required|exists:users,id',
            'creationDt' => 'required|date',
            'animal_types' => 'required',
            'y_lat'  => 'nullable|required_with:x_lon|max:15',
            'x_lon' => 'nullable|required_with:y_lat|max:15',
            'wilaya_id' => 'required|exists:wilayas,id',
            'animal_types' => 'array',
            'animal_types.*' => 'exists:animal_types,id',
        ];
    }
}
