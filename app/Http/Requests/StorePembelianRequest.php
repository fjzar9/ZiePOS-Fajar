<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
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
            'kode_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'total' => 'required',
            'pemasok_id' => 'required',
            'barang_id' => 'required',
            'harga_beli' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_masuk.required' => 'Kode masuk belum diisi!',
            'tanggal_masuk.required' => 'Tanggal masuk belum diisi!',
            'total.required' => 'Total belum diisi!',
            'pemasok_id.required' => 'Pemasok belum diisi!',
            'barang_id.required' => 'Barang belum diisi!',
            'harga_beli.required' => 'Harga beli belum diisi!',
            'jumlah.required' => 'Jumlah belum diisi!',
            'sub_total.required' => 'Sub total belum diisi!',
        ];
    }
}
