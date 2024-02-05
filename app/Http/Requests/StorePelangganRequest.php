<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Data nama pelanggan',
            'email.required' => 'Data email pelanggan',
            'no_telp.required' => 'Data no_telp pelanggan',
            'alamat.required' => 'Data alamat pelanggan',
        ];
    }
}
