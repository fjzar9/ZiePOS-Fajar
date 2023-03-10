<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use Illuminate\Support\Carbon;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId =  Penjualan::select('no_faktur')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastId == null?'PJ00000001':sprintf('PJ%08d', substr($lastId->no_faktur,2)+1));
        $data['barang'] = Barang::get();
        $data['pelanggan'] = Pelanggan::get();

        $data['penjualan'] = Penjualan::get();
        return view('penjualan.index', [
            "title" => "Input Penjualan"
        ])->with($data);
    }

    public function dataPenjualan()
    {
        if (request()->tanggal_awal || request()->tanggal_akhir) {
            $tanggal_awal = Carbon::parse(request()->tanggal_awal)->toDateString();
            $tanggal_akhir = Carbon::parse(request()->tanggal_akhir)->toDateString();
            $data['dataPenjualan'] = Penjualan::latest()->whereBetween('tgl_faktur',[$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $tanggal_awal = Carbon::today()->toDateString();
            $tanggal_akhir = Carbon::today()->toDateString();
            $data['dataPenjualan'] = Penjualan::latest()->whereBetween('tgl_faktur',[$tanggal_awal, $tanggal_akhir])->get();
        } return view('penjualan.data', [
                "title" => "Detail Penjualan",
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir
        ])->with($data);
    }

    public function printPenjualan($id){
        $data['printPenjualan'] = Penjualan::find($id);
        $data['detailBarang'] = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('penjualan.print', [
            "title" => "Nota Penjualan"
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
     * @param  \App\Http\Requests\StorePenjualanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjualanRequest $request)
    {
        //input penjualan
        $data['no_faktur'] = $request['no_faktur'];
        $data['tgl_faktur'] = $request['tgl_faktur'];
        $data['total_bayar'] = $request['total_bayar'];
        $data['pelanggan_id'] = $request['pelanggan_id'];
        $data['user_id'] = $request['user_id'];

        $input_penjualan = Penjualan::create($data);

        //input detail penjualan
        $barang_id = $request->barang_id;
        $harga_jual = $request->harga_jual;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;
        $tgl_faktur = $request->tgl_faktur;

        foreach($barang_id as $i => $v){
            $data2['penjualan_id'] = $input_penjualan->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_jual'] = $harga_jual[$i];
            $data2['jumlah'] = $jumlah[$i];
            $data2['sub_total'] = $sub_total[$i];
            $data2['tgl_faktur'] = $tgl_faktur;
            $input_detail_penjualan = DetailPenjualan::create($data2);

            $barangUpdate = Barang::find($data2['barang_id']);
            $barangUpdate->stok -= $data2['jumlah'];
            $barangUpdate->update();
        }
        return redirect('dataPenjualan')->with('success','Input penjualan berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanRequest  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
