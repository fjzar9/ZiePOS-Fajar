<?php

namespace App\Imports;


use App\Models\Pembelian;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembelianImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Pembelian([
            'No' => $row ['no'],
            'Id Pembelian'  => $row ['Id Pembelian'],
            'Id Barang'  => $row ['Id Barang'],
            'Harga Beli'  => $row ['Harga Beli'],
            'Jumlah'  => $row ['Jumlah'],
            'Sub Total'  => $row ['Sub Total']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
