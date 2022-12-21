<?php

namespace App\Http\Requests\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;

class PermissionStoreRequest extends FormRequest
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
    {return [
        'name' => 'required|string|max:255|unique:'.Permission::class,
    ];
    }
}
