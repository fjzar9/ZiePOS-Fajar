<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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
            'nama_produk' => 'required|unique:produk'
        ];
        
    }

    public function messages() {
        return [
            'nama_produk.required' => 'Data nama produk belum diisi!',
            'nama_produk.unique' => 'Data nama produk sudah ada!'
        ];
    }
}
