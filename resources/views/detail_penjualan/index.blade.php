@extends('templates.layouts')

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <form action="LaporanPenjualan" method="get">
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
                    <input type="hidden" id="first-name-column" class="form-control date-picker" name="tgl_faktur" required readonly value="{{ date('Y-m-d') }}">
                    <a href="{{ route('printLaporanPenjualan', [$tanggal_awal, $tanggal_akhir]) }}" class="btn icon icon-left btn-primary">
                        <i data-feather="printer"></i> Print
                    </a>
                    <a href="" class="btn icon icon-left btn-primary" id="btnPdf">
                        <i data-feather="download"></i> Export
                    </a>
                    <button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#FormImport">
                        <i data-feather="upload"></i> Import
                    </button>
                    @include('detail_penjualan.form')
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <h3 class="card-title text-center">{{ $title }}</h3>
                    <h4 class="text-center">{{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</h4>
                </div>
            </div>

            
        </div>
        <div class="card-body">
            @include('detail_penjualan.data')
        </div>
      </div>
</div>

@endsection