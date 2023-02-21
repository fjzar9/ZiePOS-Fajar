<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
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
        $data['detail_pembelian'] = DetailPembelian::latest()->get();
        return view('detail_pembelian.index', [
            "title" => "Laporan Pembelian"
        ])->with($data);
    }

    public function printLaporanPembelian(){
        $data['detail_pembelian'] = DetailPembelian::get();
        return view('detail_pembelian.print', [
            "title" => "Laporan Pembelian"
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