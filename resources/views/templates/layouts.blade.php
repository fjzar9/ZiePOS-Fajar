<!DOCTYPE html>
<html lang="en">
  @include('templates.header')

  <body>
    <div id="app">
      @include('templates.sidebar')
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
                        <a href="{{ url('/') }}">Home</a>
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
            @include('templates.footer')
          </div>
        </div>

      </div>
    </div>
  </body>

</html>