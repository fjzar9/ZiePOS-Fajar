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
            <form action="register" method="POST">
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Nama Lengkap" name="name" id="name" required value="{{ old('name') }}" @error('name') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username" required value="{{ old('username') }}" @error('username') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Email" name="email" id="email" required value="{{ old('email') }}" @error('email') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="number" class="form-control form-control-xl" placeholder="No Telp" name="no_telp" id="no_telp" required value="{{ old('no_telp') }}" @error('no_telp') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                @error('no_telp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Alamat" name="alamat" id="alamat" required value="{{ old('alamat') }}" @error('alamat') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password" required @error('password') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="ROle" name="role" id="role" required value="Kasir" readonly @error('role') is-invalid @enderror/>
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
                @error('role')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
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
  </body>
</html>
