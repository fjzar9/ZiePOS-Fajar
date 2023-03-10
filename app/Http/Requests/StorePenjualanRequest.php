<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenjualanRequest extends FormRequest
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
            'no_faktur' => 'required',
            'tgl_faktur' => 'required',
            'total_bayar' => 'required',
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'harga_jual' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'no_faktur.required' => 'Nomor faktur belum diisi!',
            'tgl_faktur.required' => 'Tanggal faktur belum diisi!',
            'total_bayar.required' => 'Total belum diisi!',
            'pelanggan_id.required' => 'Pelanggan belum diisi!',
            'barang_id.required' => 'Barang belum diisi!',
            'harga_jual.required' => 'Harga jual belum diisi!',
            'jumlah.required' => 'Jumlah belum diisi!',
            'sub_total.required' => 'Sub total belum diisi!',
        ];
    }
}
