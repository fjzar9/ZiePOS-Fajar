<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\Barang;
use App\Models\Pemasok;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use Illuminate\Support\Carbon;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId =  Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastId == null?'PB00000001':sprintf('PB%08d', substr($lastId->kode_masuk,2)+1));
        $data['barang'] = Barang::get();
        $data['pemasok'] = Pemasok::get();

        $data['pembelian'] = Pembelian::get();
        return view('pembelian.index', [
            "title" => "Input Pembelian"
        ])->with($data);
    }

    public function dataPembelian()
    {    
        if (request()->tanggal_awal || request()->tanggal_akhir) {
            $tanggal_awal = Carbon::parse(request()->tanggal_awal)->toDateString();
            $tanggal_akhir = Carbon::parse(request()->tanggal_akhir)->toDateString();
            $data['dataPembelian'] = Pembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        } else {
            $tanggal_awal = Carbon::today()->toDateString();
            $tanggal_akhir = Carbon::today()->toDateString();
            $data['dataPembelian'] = Pembelian::latest()->whereBetween('tanggal_masuk',[$tanggal_awal, $tanggal_akhir])->get();
        } return view('pembelian.data', [
                "title" => "Detail Pembelian",
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir
        ])->with($data);
    }

    public function printPembelian($id)
    {
        
        $data['printPembelian'] = Pembelian::find($id);
        $data['detailBarang'] = DetailPembelian::where('pembelian_id', $id)->get();
        return view('pembelian.print', [
            "title" => "Nota Pembelian"
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
     * @param  \App\Http\Requests\StorePembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembelianRequest $request)
    {
        //input pembelian
        $data['kode_masuk'] = $request['kode_masuk'];
        $data['tanggal_masuk'] = $request['tanggal_masuk'];
        $data['total'] = $request['total'];
        $data['pemasok_id'] = $request['pemasok_id'];
        $data['user_id'] = $request['user_id'];

        $input_pembelian = Pembelian::create($data);

        //input detail pembelian
        $barang_id = $request->barang_id;
        $harga_beli = $request->harga_beli;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;
        $tanggal_masuk = $request->tanggal_masuk;

        
        foreach($barang_id as $i => $v){
            $data2['pembelian_id'] = $input_pembelian->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_beli'] = $harga_beli[$i];
            $data2['jumlah'] = $jumlah[$i];
            $data2['sub_total'] = $sub_total[$i];
            $data2['tanggal_masuk'] = $tanggal_masuk;
            $input_detail_pembelian = DetailPembelian::create($data2);

            $barangUpdate = Barang::find($data2['barang_id']);
            $barangUpdate->stok += $data2['jumlah'];
            $barangUpdate->update();
        }
        return redirect('dataPembelian')->with('success','Input pembelian berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
