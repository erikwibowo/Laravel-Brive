<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => 'required|unique:users,email,' . $this->user,
            'password'              => ['nullable', 'confirmed', Password::defaults()],
            'password_confirmation' => 'sometimes|required_with:password|same:password',
            'role'                  => ['required'],
        ];
    }
}
