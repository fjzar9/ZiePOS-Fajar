<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasokRequest extends FormRequest
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
            'nama_pemasok' => 'required|unique:pemasok',
            'alamat' => 'required',
            'no_telp' => 'required|unique:pemasok',
            'salesman' => 'required',
            'bank_id' => 'required',
            'no_rek' => 'required|unique:pemasok'
        ];
    }

    public function messages() {
        return [
            'nama_pemasok.required' => 'Data nama pemasok belum diisi!',
            'nama_pemasok.unique' => 'Data nama pemasok sudah ada!',
            'alamat.required' => 'Data alamat pemasok belum diisi!',
            'no_telp.required' => 'Data no telp pemasok belum diisi!',
            'no_telp.unique' => 'Data no telp pemasok sudah ada!',
            'salesman.required' => 'Data salesman pemasok belum diisi!',
            'bank_id.required' => 'Data bank pemasok belum diisi!',
            'no_rek.required' => 'Data no rekening pemasok belum diisi!',
            'no_rek.unique' => 'Data no rekening pemasok sudah ada!'
        ];
    }
}
