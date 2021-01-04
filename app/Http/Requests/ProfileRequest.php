<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => 'required|max:50',
            'last_name'  => 'required|max:50',
            'phone'      => 'required|unique:users,phone|max:14',
            'email'      => 'required|unique:users,email|email',
            'bio'        => 'nullable|max:50'
        ];
    }
}