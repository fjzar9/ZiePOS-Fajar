<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\Satuan;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId =  Barang::select('kode_barang')->orderBy('created_at', 'desc')->first();
        $data['kode_barang'] = ($lastId == null?'B000001':sprintf('B%06d', substr($lastId->kode_barang,1)+1));
        // return $data;
        $data['barang'] = Barang::get();
        // $data['barang'] = Barang::where(auth()->user())->get();
        $produk = Produk::all()->pluck('id', 'nama_produk');
        $satuan = Satuan::all()->pluck('id', 'jenis_satuan');
        return view('barang.index', compact(['produk', 'satuan']), [
            "title" => "Barang"
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
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        Barang::create($request->all());
        return redirect('barang')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang->update($request->all());
        return redirect('barang')->with('success', 'Data barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('barang')->with('success', 'Data barang berhasil dihapus!');
    }
}
