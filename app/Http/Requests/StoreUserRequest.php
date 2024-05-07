<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
//    protected $redirect = '/home';
//    protected $redirectRoute = 'users.index';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        if($this->user()->can('store')){
//            return true;
//        }
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
            'name' => ['required', 'string', 'max:255'],
            'age' => ['bail', 'nullable', 'numeric', 'min_digits:1', 'max_digits:3'],
            'email' => ['required', 'email:rfc,dns', 'unique:users'],
            'image' => ['required', 'file', 'mimes:jpeg,jpg,png,gif,webp'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле name обязательное',
            'name.string' => 'Поле name должно быть строкой',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'email адрес',
        ];
    }
}
