<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
        return [
            'nama' => 'required',
            'jenis_id' => 'required',
            'harga' => 'required',
            // 'image' => 'required',
            'deskripsi' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Data nama menu',
            'jenis_id.required' => 'Data jenis_id menu',
            'harga.required' => 'Data harga menu',
            // 'image.required' => 'Data image menu',
            'deskripsi.required' => 'Data deskripsi category',
        ];
    }
}
