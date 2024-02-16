<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePemesananRequest extends FormRequest
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
            'meja_id' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_pemesan' => 'required',
            'jumlah_pelanggan' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'meja_id.required' => 'nomor meja',
            'jam_mulai.required' => 'jam mulai',
            'jam_selesai.required' => 'jam selesai',
            'nama_pemesan.required' => 'nama pemesan',
            'jumlah_pelanggan.required' => 'jumlah pelanggan',
        ];
    }
}
