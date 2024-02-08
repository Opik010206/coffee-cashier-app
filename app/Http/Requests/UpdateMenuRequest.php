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
            'image' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg|max:1024',
            'deskripsi' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'nama',
            'jenis_id.required' => 'jenis',
            'harga.required' => 'harga',
            'image.required' => 'image',
            'deskripsi.required' => 'deskripsi',
        ];
    }
}
