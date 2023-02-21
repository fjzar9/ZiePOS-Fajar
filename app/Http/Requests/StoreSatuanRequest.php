<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSatuanRequest extends FormRequest
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
            'jenis_satuan' => 'required|unique:satuan'
        ];
    }

    public function messages() {
        return [
            'jenis_satuan.required' => 'Data jenis satuan belum diisi!',
            'jenis_satuan.unique' => 'Data jenis satuan sudah ada!'
        ];
    }
}
