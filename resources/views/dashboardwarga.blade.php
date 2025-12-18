@extends('layouts.mainwarga')
@section('judul')
<title>Dashboard Warga - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang Di dashboard Pelayanan umum</h5>
                <p class="mb-4">
                  Anda bisa update data diri anda di halaman profil, melakukan pengajuan surat di menu surat dan cek progres pengajuan di halaman dashboard ini.
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                 src="{{ asset ('plugin/img/illustrations/war.jpg') }}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mb-4 order-0">
          <div class="card">
              <div class="card-body">
                  <li class="d-flex mb-0 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                      <img src="{{ asset ('plugin/img/icons/email.png') }}" alt="User" class="rounded" />
                      </div>
                      <div class="me-10">
                          <span>Total Pengajuan </span>
                          <h3 class="text-nowrap mb-1 text-primary">{{ $pengajuan }}</h3>
                          <h5 class="text-nowrap mb-1">Surat</h5> 
                      </div>
                  </li>
              </div>
          </div>
       </div>

       <div class="col-lg-4 mb-4 order-0">
          <div class="card">
              <div class="card-body">
                  <li class="d-flex mb-0 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                      <img src="{{ asset ('plugin/img/icons/new-email.png') }}" alt="User" class="rounded" />
                      </div>
                      <div class="me-10">
                          <span>Total Surat di Approve </span>
                          <h3 class="text-nowrap mb-1 text-primary">{{ $approve }}</h3>
                          <h5 class="text-nowrap mb-1">Surat</h5> 
                      </div>
                  </li>
              </div>
          </div>
       </div>

       <div class="col-lg-4 mb-4 order-0">
        <div class="card">
            <div class="card-body">
                <li class="d-flex mb-0 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ asset ('plugin/img/icons/business.png') }}" alt="User" class="rounded" />
                    </div>
                    <div class="me-10">
                        <span>Total Surat Selesai </span>
                        <h3 class="text-nowrap mb-1 text-primary">{{ $selesai }}</h3>
                        <h5 class="text-nowrap mb-1">Surat</h5> 
                    </div>
                </li>
            </div>
        </div>
     </div>
  </div>

    {{-- <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , made with ❤️ by
          <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
        </div>
        <div>
          <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
          <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

          <a
            href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="footer-link me-4"
            >Documentation</a
          >

          <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="footer-link me-4"
            >Support</a
          >
        </div>
      </div>
    </footer>
    <!-- / Footer --> --}}

    <div class="content-backdrop fade"></div>
  </div>
@endsection
