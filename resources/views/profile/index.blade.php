@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="card">
    <div class="card-header">
      {{-- <h5 class="card-title">Horizontal Navs</h5> --}}
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="account-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">info</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">Security</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
          <div class="d-flex align-items-start align-items-sm-center my-2">
              <div class="">
                  <img src="assets/images/faces/fajar.png" alt="Face 1" class="d-block" height="100" width="100">
              </div>
              <div class="button-wrapper ms-4">
                  <input type="button" value="Upload New Photo" class="btn btn-primary mb-2" onclick="document.getElementById('file').click();" />
                  <input type="file" class="d-none" id="file" name="file"/>
                  <p class="mt-2 mb-0">Allowed PNG or JPEG. Max size of 800K.</p>
              </div>
            </div>
        
            <form class="form" action="register" method="POST">
                @csrf
              <div class="row mt-4">
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ auth()->user()->name }}">
                      <label for="name">Nama Lengkap</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ auth()->user()->username }}">
                      <label for="username">Username</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ auth()->user()->email }}">
                      <label for="email">Alamat Email</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" value="{{ auth()->user()->no_telp }}">
                      <label for="no_telp">No Telp</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="Alamat" value="{{ auth()->user()->alamat }}">
                      <label for="alamat">Alamat</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="row">
                      <div class="col-12">
                          <label for="" class="mb-2">Jenis Kelamin</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
                          <div class="form-check form-check-inline mb-3">
                              <input class="form-check-input" type="radio" name="radiodefault" id="pria" @checked(Auth::user()->jenis_kelamin == "Pria")/>
                              <label class="form-check-label" for="pria">
                                Pria
                              </label>
                          </div>
                          <div class="form-check form-check-inline mb-3">
                              <input class="form-check-input" type="radio" name="radiodefault" id="wanita" @checked(Auth::user()->jenis_kelamin == "Wanita")/>
                              <label class="form-check-label" for="wanita">
                                Wanita
                              </label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-start">
                  <button type="submit" class="btn btn-primary me-1 mb-1 mt-2">
                    Simpan
                  </button>
                  <button type="reset" class="btn btn-light-secondary me-1 mb-1 mt-2">
                    Reset
                  </button>
                </div>
              </div>
            </form>

      </div>

      <div class="tab-pane fade"
        id="info"
        role="tabpanel"
        aria-labelledby="info-tab"
      >
        Integer interdum diam eleifend metus lacinia, quis
        gravida eros mollis. Fusce non sapien sit amet magna
        dapibus ultrices. Morbi tincidunt magna ex, eget
        faucibus sapien bibendum non. Duis a mauris ex. Ut
        finibus risus sed massa mattis porta. Aliquam sagittis
        massa et purus efficitur ultricies. Integer pretium
        dolor at sapien laoreet ultricies. Fusce congue et lorem
        id convallis. Nulla volutpat tellus nec molestie
        finibus. In nec odio tincidunt eros finibus ullamcorper.
        Ut sodales, dui nec posuere finibus, nisl sem aliquam
        metus, eu accumsan lacus felis at odio. Sed lacus quam,
        convallis quis condimentum ut, accumsan congue massa.
        Pellentesque et quam vel massa pretium ullamcorper vitae
        eu tortor.
      </div>
      <div
        class="tab-pane fade"
        id="security"
        role="tabpanel"
        aria-labelledby="security-tab"
      >
        <p class="mt-2">
          Duis ultrices purus non eros fermentum hendrerit.
          Aenean ornare interdum viverra. Sed ut odio velit.
          Aenean eu diam dictum nibh rhoncus mattis quis ac
          risus. Vivamus eu congue ipsum. Maecenas id
          sollicitudin ex. Cras in ex vestibulum, posuere orci
          at, sollicitudin purus. Morbi mollis elementum enim,
          in cursus sem placerat ut.
        </p>
      </div>
    </div>
    </div>
  </div>

@endsection

@push('scripts')

@endpush