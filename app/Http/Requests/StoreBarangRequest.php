<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_barang' => 'required',
            'produk_id' => 'required',
            'nama_barang' => 'required',
            'satuan_id' => 'required',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'ditarik' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'kode_barang.required' => 'Kode barang belum diisi',
            'produk_id.required' => 'Kategori belum diisi',
            'nama_barang.required' => 'Nama Barang belum diisi',
            'satuan_id.required' => 'Satuan belum diisi',
            'harga_jual.required' => 'Harga jual belum diisi',
            'harga_jual.numeric' => 'Harga Jual belum diisi',
            'stok.required' => 'Stok belum diisi',
            'stok.numeric' => 'Stok bukan angka',
            'ditarik.required' => 'Ditarik belum diisi',
            'ditarik.numeric' => 'Numeric bukan angka'
        ];
    }
}
