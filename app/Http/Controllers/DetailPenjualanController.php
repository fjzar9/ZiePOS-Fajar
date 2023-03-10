<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreDetailPenjualanRequest;
use App\Http\Requests\UpdateDetailPenjualanRequest;

class DetailPenjualanController extends Controller
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
            $data['detail_penjualan'] = DetailPenjualan::latest()->whereBetween('tgl_faktur',[$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $tanggal_awal = Carbon::today()->toDateString();
            $tanggal_akhir = Carbon::today()->toDateString();
            $data['detail_penjualan'] = DetailPenjualan::latest()->whereBetween('tgl_faktur',[$tanggal_awal, $tanggal_akhir])->get();
        } return view('detail_penjualan.index', [
                "title" => "Laporan Penjualan",
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir
        ])->with($data, $tanggal_awal, $tanggal_akhir);
    }

    public function printLaporanPenjualan($tanggal_awal, $tanggal_akhir){
        $data['detail_penjualan'] = DetailPenjualan::latest()->whereBetween('tgl_faktur',[$tanggal_awal, $tanggal_akhir])->get();
        return view('detail_penjualan.print', [
            "title" => "Laporan Penjualan",
            "tanggal_awal" => $tanggal_awal,
            "tanggal_akhir" => $tanggal_akhir
        ])->with($data);
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
     * @param  \App\Http\Requests\StoreDetailPenjualanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailPenjualanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailPenjualanRequest  $request
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailPenjualanRequest $request, DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPenjualan $detailPenjualan)
    {
        //
    }
}