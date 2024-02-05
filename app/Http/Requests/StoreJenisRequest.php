<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisRequest extends FormRequest
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
            // 'ketegory_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Data nama jenis',
            // 'kategory_id.required' => 'Data kategory_id',
        ];
    }
}
