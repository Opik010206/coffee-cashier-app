<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'nama_karyawan' => 'required',
            // 'tanggal_masuk' => 'required',
            // 'waktu_masuk' => 'required',
            // 'status' => 'required',
            // 'waktu_keluar' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama_karyawan.required' => 'nama karyawan',
            'tanggal_masuk.required' => 'tanggal masuk',
            'waktu_masuk.required' => 'waktu masuk',
            'status.required' => 'status',
            'waktu_keluar.required' => 'waktu keluar',
        ];
    }
}
