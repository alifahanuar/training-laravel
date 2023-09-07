<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'details' => ['required'],
            'user_id' => ['required', Rule::in(User::pluck('id'))],
            'image' => 'image|mimes:jpeg,gif,svg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Ruang :attribute perlu diisi'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'nama alat',
            'details' => 'keterangan'
        ];
    }
}
