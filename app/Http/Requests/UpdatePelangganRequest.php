<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePelangganRequest extends FormRequest
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
            'kode_pelanggan' => 'required|unique:pelanggan',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|unique:pelanggan',
            'email' => 'required|email:dns|unique:pelanggan'
        ];
    }

    public function messages()
    {
        return [
            'kode_pelanggan.required' => 'Kode pelanggan belum diisi!',
            'kode_pelanggan.unique' => 'Kode pelanggan sudah ada!',
            'nama.required' => 'Nama belum diisi!',
            'alamat.required' => 'Alamat belum diisi!',
            'no_telp.required' => 'No Telp belum diisi!',
            'no_telp.numeric' => 'No Telp bukan angka!',
            'no_telp.unique' => 'No Telp sudah ada!',
            'email.required' => 'Email belum diisi!',
            'email.unique' => 'Email sudah ada!'
        ];
    }
}
