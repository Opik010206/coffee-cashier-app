<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukTitipanRequest extends FormRequest
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
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Nama Produk',
            'nama_supplier.required' => 'Nama Supplier',
            'harga_beli.required' => 'Harga Beli',
            'harga_jual.required' => 'Harga Jual',
            'stock.required' => 'Stock',
            'keterangan.required' => 'Keterangan',
        ];
    }
}
