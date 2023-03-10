<!DOCTYPE html>
<html lang="en">
  @include('templates.header')
  <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/auth.css"/>

  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
                <img src="{{ asset('assets') }}/images/logo/logo2.svg" alt="Logo"/>
            </div>
            <h1 class="auth-title mb-5">Sign Up</h1>
            <form action="register" method="POST" data-parsley-validate>
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Nama Lengkap" name="name" id="name" data-parsley-required="true" data-parsley-required-message="Nama lengkap harus diisi!" value="{{ old('name') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username" data-parsley-required="true" data-parsley-required-message="Username harus diisi!" value="{{ old('username') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Email" name="email" id="email" data-parsley-required="true" data-parsley-required-message="Email harus diisi!" value="{{ old('email') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="number" class="form-control form-control-xl" placeholder="No Telp" name="no_telp" id="no_telp" data-parsley-required="true" data-parsley-required-message="No telp harus diisi!" value="{{ old('no_telp') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-telephone"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Alamat" name="alamat" id="alamat" data-parsley-required="true" data-parsley-required-message="Alamat harus diisi!" value="{{ old('alamat') }}"/>
                <div class="form-control-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password" data-parsley-required="true" data-parsley-required-message="Password harus diisi!"/>
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
                Sign Up
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Already have an account?
                <a href="{{ url('login') }}" class="font-bold">Log in</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
    @include('templates.footer')
  </body>
</html>
