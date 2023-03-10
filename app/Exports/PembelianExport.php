<?php

namespace App\Exports;

use App\Models\DetailPembelian;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class PembelianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tanggal_awal;
    protected $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function collection()
    {
        // return DetailPembelian::where('pembelian_id', auth()->user()->pembelian_id)->get(); 
        $data = DetailPembelian::whereBetween('tanggal_masuk',[$this->tanggal_awal, $this->tanggal_akhir])->get();
        dd($data);


    }

    public function headings(): array 
    {
        return 
        [
            'No',
            'Id Pembelian',
            'Id Barang',
            'Harga Beli',
            'Jumlah',
            'Sub Total',
            'Tanggal Masuk'
        ];
    }

    public function registerEvent(): array
    {
        return 
        [
            AfterSheet::class  =>function(AfterSheet $event)
            {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1,2);
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1','DATA PEMBELIAN');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:J' .$event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allborders' =>[
                            'borderStyle' =>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' =>['argb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
