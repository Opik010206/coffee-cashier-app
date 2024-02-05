<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKaryawanRequest extends FormRequest
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
            'nip' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'alamat' => 'required',
            // 'golongan_id' => 'required',
            'foto' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nip.required' => 'Data nip karyawan',
            'nik.required' => 'Data nik karyawan',
            'nama.required' => 'Data tanggal karyawan',
            'jenis_kelamin.required' => 'Data jenis_kelamin karyawan',
            'tempat_lahir.required' => 'Data tempat_lahir karyawan',
            'tanggal_lahir.required' => 'Data tanggal_lahir karyawan',
            'no_telp.required' => 'Data no_telp karyawan',
            'agama.required' => 'Data agama karyawan',
            'status_nikah.required' => 'Data status_nikah karyawan',
            'alamat.required' => 'Data alamat karyawan',
            'golongan_id.required' => 'Data golongan_id karyawan',
            'foto.required' => 'Data foto karyawan',
        ];
    }
}
