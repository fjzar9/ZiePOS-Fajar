<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Models\Bank;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pemasok'] = Pemasok::get();
        $bank = Bank::all()->pluck('id', 'nama_bank');
        return view('pemasok.index', compact('bank'), [
            "title" => "Pemasok"
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
     * @param  \App\Http\Requests\StorePemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemasokRequest $request)
    {
        Pemasok::create($request->all());
        return redirect('pemasok')->with('success', 'Data pemasok berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasokRequest  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    {
        $pemasok->update($request->all());
        return redirect('pemasok')->with('success', 'Data pemasok berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect('pemasok')->with('success', 'Data pemasok berhasil dihapus!');
    }
}
