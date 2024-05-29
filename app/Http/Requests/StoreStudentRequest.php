<?php

namespace App\Http\Requests;

use App\Rules\ValidateAge;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => 'required|numeric|digits:8|unique:students,dni',
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'birthdate' => ['required', new ValidateAge],
        ];
    }
}

?>