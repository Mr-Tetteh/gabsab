<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:10', Rule::unique('users', 'contact')->ignore($this->user()->id)],
            'date_of_birth' => ['required', 'date'],
            'email' => ['required', 'email', 'lowercase', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],

        ];
    }
}
