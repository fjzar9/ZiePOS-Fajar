<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
            'nama_bank' => 'required|unique:bank'
        ];
    }

    public function messages() {
        return [
            'nama_bank.required' => 'Data nama bank belum diisi!',
            'nama_bank.unique' => 'Data nama bank sudah ada!'
        ];
    }
}
