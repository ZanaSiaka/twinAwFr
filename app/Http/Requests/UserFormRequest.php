<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $isRequired = request()->isMethod("POST") ?"required|": "";
        return [
            //
            'matricule' => $isRequired.'string',
			'email' => $isRequired.'email',
			'email_verified_at' => $isRequired.'email',
			'password' => $isRequired.'min:8',
			'pseudo' => $isRequired.'string',
			'imageUrl' => $isRequired.'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'roles'=> "required|exists:roles,id"
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}