@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <form action="dataPembelian" method="get">
                <div class="row mb-5">
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
            <div class="row my-2">
                <div class="col">
                    <h3 class="card-title text-center">{{ $title }}</h3>
                    <h4 class="text-center">{{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="dataTable1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Pemasok</th>
                            <th>Pegawai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPembelian as $dp)
                        <tr>
                            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                            <td>{{ $dp->kode_masuk }}</td>
                            <td>{{ $dp->tanggal_masuk->translatedFormat('d F Y') }}</td>
                            <td>@currency($dp->total)</td>
                            <td>{{ $dp->pemasok->nama_pemasok }}</td>
                            <td>{{ $dp->user->name }}</td>
                            <td>
                                <a href="printPembelian/{{ $dp->id }}" type="button" class="btn btn-secondary">
                                    <i data-feather="printer"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
      </div>
</div>

@endsection

@push('scripts')

@endpush

