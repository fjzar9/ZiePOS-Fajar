<!DOCTYPE html>
<html lang="en">
  @include('templates.header')

  <body>
    <div id="app">
      @if(auth()->user()->role == 'Owner')
        @include('templates.sidebar-owner')
      @elseif(auth()->user()->role == 'Admin')
        @include('templates.sidebar-admin')
      @elseif(auth()->user()->role == 'Kasir')
        @include('templates.sidebar-kasir')
      @endif
      {{-- @include('templates.sidebar') --}}
      <div id="main" class="layout-navbar navbar-fixed">
        @include('templates.navbar')
        <div id="main-content">
          <div class="page-heading">
            <div class="page-title">
              <div class="row mb-3">
                <div class="col-12 col-md-6 order-md-1 order-first">
                  <h3>{{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-last">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ $title }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            @yield('contents')
            <footer class="d-print-none">
              <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                  <p>Copyright &copy; 2022</p>
                </div>
                <div class="float-end">
                  <p>
                    ZIEPOS by <a href="https://smkn1cianjur.sch.id/">SMAKZIE</a>
                  </p>
                </div>
              </div>
            </footer>
            @include('templates.footer')
          </div>
        </div>

      </div>
    </div>
  </body>

</html>