@extends('templates.layouts')

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <form action="LaporanPembelian" method="get">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-column">Tanggal Awal</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" id="first-name-column" class="form-control date-picker" name="tanggal_awal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-column">Tanggal Akhir</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" id="first-name-column" class="form-control date-picker" name="tanggal_akhir" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <button type="submit" class="btn icon icon-left btn-primary">
                            <i data-feather="search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
            <div class="divider">
                <div class="divider-text">Print Section</div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <a href="printLaporanPembelian" class="btn icon icon-left btn-primary">
                        <i data-feather="printer"></i> Print
                    </a>
                    <a href="#" class="btn icon icon-left btn-primary" id="btnPdf">
                        <i data-feather="download"></i> Download
                    </a>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <h3 class="card-title text-center">ZIEPOS</h3>
                    <h4 class="text-center">{{ $title }}  $tanggal_awal <br>s/d $tanggal_akhir </h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            @include('detail_pembelian.data')
        </div>
    </div>
</div>

@endsection