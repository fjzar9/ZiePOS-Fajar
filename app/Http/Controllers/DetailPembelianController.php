<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Exports\PembelianExport;
use App\Imports\PembelianImport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreDetailPembelianRequest;
use App\Http\Requests\UpdateDetailPembelianRequest;

class DetailPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->tanggal_awal || request()->tanggal_akhir) {
            $tanggal_awal = Carbon::parse(request()->tanggal_awal)->toDateString();
            $tanggal_akhir = Carbon::parse(request()->tanggal_akhir)->toDateString();
            $data['detail_pembelian'] = DetailPembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $tanggal_awal = Carbon::today()->toDateString();
            $tanggal_akhir = Carbon::today()->toDateString();
            $data['detail_pembelian'] = DetailPembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        } return view('detail_pembelian.index', [
                "title" => "Laporan Pembelian",
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir
        ])->with($data);
    }

    public function printLaporanPembelian($tanggal_awal, $tanggal_akhir){
        $data['detail_pembelian'] = DetailPembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        return view('detail_pembelian.print', [
            "title" => "Laporan Pembelian",
            "tanggal_awal" => $tanggal_awal,
            "tanggal_akhir" => $tanggal_akhir
        ])->with($data);
    }

    public function exportData($tanggal_awal, $tanggal_akhir) {
        $data['detail_pembelian'] = DetailPembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        // return $data;
        $data2 = Excel::download(new PembelianExport($tanggal_awal, $tanggal_akhir), $data.'_Pembelian.xls');
        return $data2;
    }

    public function importData() {
        Excel::import(new PembelianImport, request()->file('import'));
        return redirect(request()->segment(1).'/detail_pembelian')->with('success', 'import data pembelian berhasil');
        // return redirect ('detail_pembelian')->with('success', 'import data pembelian berhasil');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailPembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailPembelianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailPembelianRequest  $request
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailPembelianRequest $request, DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPembelian $detailPembelian)
    {
        //
    }
}