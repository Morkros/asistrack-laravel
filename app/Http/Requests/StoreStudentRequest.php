<?php

namespace App\Http\Requests;

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
            'dni' => 'required|numeric|max:999999999|unique:students,dni',
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'nacimiento' => 'required',
            'grupo' => 'nullable'
        ];
    }
}

?>