@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="card">
    <div class="card-header">
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
            <div class="profile-pic mx-auto">
              <label for="image">
                <input type="file" name="image" id="image" style="display:none;"/>
                <img src="assets/images/faces/fajar.png" alt="Face 1" class="d-block profile-image">
                <div class="profile-content">
                  <span class="profile-icon"><i data-feather="camera"></i></span>
                  <span class="profile-text">Edit Profile</span>
                </div>
             </label>
            </div>
            @foreach ($user as $item)
                
            @endforeach
            <form class="form" action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
              @method('patch')
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
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" @checked(Auth::user()->jenis_kelamin == "Pria") value="Pria"/>
                              <label class="form-check-label" for="pria">
                                Pria
                              </label>
                          </div>
                          <div class="form-check form-check-inline mb-3">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" @checked(Auth::user()->jenis_kelamin == "Wanita") value="Wanita"/>
                              <label class="form-check-label" for="wanita">
                                Wanita
                              </label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid gap-2 d-md-block">
                    <button type="submit" class="btn btn-primary me-1 mb-1 mt-2">
                      Simpan
                    </button>
                  </div>
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
      <form class="form" action="{{ route('editPassword') }}" method="POST">
        @csrf
        <div class="row mt-4">
          <div class="col-md-6 col-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password Lama" value="">
                <label for="name">Password Lama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password Baru" value="">
                <label for="name">Password Baru</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi Password" value="">
                <label for="name">Konfirmasi Password</label>
            </div>
            <div class="col-12 d-flex justify-content-start">
              <button type="submit" class="btn btn-primary me-1 mb-1 mt-2">
                Simpan
              </button>
            </div>
          </div>
          <div class="col-md-6 col-12 d-none d-lg-block d-md-block">
            <img class="img-fluid mx-auto d-block img-float" src="assets/images/samples/password.png" alt="Card image cap" height="250" width="250">
          </div>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>

@endsection

@push('scripts')

@endpush