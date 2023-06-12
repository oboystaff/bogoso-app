<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicationRequest extends FormRequest
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
            'id_number' => ['required', 'numeric', 'unique:applications'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:applications'],
            'phone' => ['required', 'string', 'unique:applications'],
            'attachment' => ['required'],
        ];
    }
}
