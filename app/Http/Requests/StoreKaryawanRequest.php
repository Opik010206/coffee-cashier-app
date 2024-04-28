<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
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
            'foto' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'nip.required' => 'nip',
            'nik.required' => 'nik',
            'nama.required' => 'nama',
            'jenis_kelamin.required' => 'jenis kelamin',
            'tempat_lahir.required' => 'tempal lahir',
            'tanggal_lahir.required' => 'tanggal lahir',
            'no_telp.required' => 'nomor telepon',
            'agama.required' => 'agama',
            'status_nikah.required' => 'status nikah',
            'alamat.required' => 'alamat',
            // 'golongan_id.required' => 'golongan',
            'foto.required' => 'foto',
        ];
    }
}
