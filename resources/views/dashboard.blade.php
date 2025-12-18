@extends('layouts.main')
@section('judul')
<title>Dashboard - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-success">Selamat Datang di Aplikasi Pelayanan Umum</h5>
                  <p class="mb-4">
                    Terdapat <span class="fw-bold">{{ $pengajuanproses }}</span> surat pengajuan hari ini. Silahkan cek surat pengajuan hari ini.
                  </p>

                  <a href="{{ url('admindesa/SK/pengajuan_baru') }}" class="btn btn-sm btn-outline-primary">Surat Pengajuan</a>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="{{ asset ('plugin/img/illustrations/7822.png') }}"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="{{ asset ('plugin/img/illustrations/man-with-laptop-dark.png') }}"
                    data-app-light-img="{{ asset ('plugin/img/illustrations/man-with-laptop-light.png') }}"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-lg-4 col-md-4 order-1"> --}}
          <div class="row">
                  <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                        <div class="card-body">
                            <li class="d-flex mb-0 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset ('plugin/img/icons/email.png') }}" alt="User" class="rounded" />
                                </div>
                                <div class="me-10">
                                    <span>Total SK Terealisasi </span>
                                    <h2 class="text-nowrap mb-1 text-primary">{{ $totalsk }}</h2>
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
                                    <span>Total Pengajuan SK </span>
                                    <h2 class="text-nowrap mb-1 text-primary">{{ $pengajuan }}</h2>
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
                                  <span>Total Template SK </span>
                                  <h2 class="text-nowrap mb-1 text-primary">{{ $totalkodesk }}</h2>
                                  <h5 class="text-nowrap mb-1">Surat</h5> 
                              </div>
                          </li>
                      </div>
                  </div>
               </div>
           </div>
        {{-- </div> --}}
        <!-- Progres Bulanan SK -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
                <h5 class="card-header m-0 me-2 pb-3">Progres Bulanan SK</h5>
                <div id="linesk"></div>
            </div>
          </div>
        </div>
        <!--/ Perbandingan Total Jenis SK -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
              <h5 class="card-header m-0 me-2 pb-3">Perbandingan Total SK berdasarkan Jenis SK</h5>
              <div id="barsk"></div>
           </div>
          </div>
        </div>
            
              <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Jumlah Penduduk</h5>
                  </div>
                  <div class="card-body">
                    <ul class="p-0 m-0">
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="{{ asset ('plugin/img/icons/men.png') }}" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Penduduk</small>
                            <h4 class="mb-0">Pria</h4>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{ $laki }}</h6>
                            <span class="text-muted">Orang</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="{{ asset ('plugin/img/icons/woman.png') }}" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Penduduk</small>
                            <h4 class="mb-0">Wanita</h4>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{ $perempuan }}</h6>
                            <span class="text-muted">Orang</span>
                          </div>
                        </div>
                      </li>
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <img src="{{ asset ('plugin/img/icons/children.png') }}" alt="User" class="rounded" />
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Penduduk</small>
                            <h4 class="mb-0">Anak</h4>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{ $anak }}</h6>
                            <span class="text-muted">Orang</span>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

          <!-- Progres Bulanan SK -->
        {{-- <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
                <h5 class="card-header m-0 me-2 pb-3">Perbandingan JK</h5>
                <div id="donutjk"></div>
            </div>
          </div>
        </div> --}}
        <!--/ Perbandingan Total Jenis SK -->
        <div class="col-4 col-lg-9 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
              <h5 class="card-header m-0 me-2 pb-3">Perbandingan Pekerjaan</h5>
              <div id="columnjk"></div>
           </div>
          </div>
        </div>
            
          
      </div>
      {{-- <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-0">
                <h5 class="m-0 me-2">Order Statistics</h5>
                <small class="text-muted">42.82k Total Sales</small>
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="orederStatistics"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                  <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                  <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                  <a class="dropdown-item" href="javascript:void(0);">Share</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column align-items-center gap-1">
                  <h2 class="mb-2">8,258</h2>
                  <span>Total Orders</span>
                </div>
                <div id="orderStatisticsChart"></div>
              </div>
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"
                      ><i class="bx bx-mobile-alt"></i
                    ></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Electronic</h6>
                      <small class="text-muted">Mobile, Earbuds, TV</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">82.5k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Fashion</h6>
                      <small class="text-muted">T-shirt, Jeans, Shoes</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">23.8k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Decor</h6>
                      <small class="text-muted">Fine Art, Dining</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">849k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-secondary"
                      ><i class="bx bx-football"></i
                    ></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Sports</h6>
                      <small class="text-muted">Football, Cricket Kit</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">99</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        <div class="col-md-6 col-lg-4 order-1 mb-4">
          <div class="card h-100">
            <div class="card-header">
              <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                  <button
                    type="button"
                    class="nav-link active"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-tabs-line-card-income"
                    aria-controls="navs-tabs-line-card-income"
                    aria-selected="true"
                  >
                    Income
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab">Expenses</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link" role="tab">Profit</button>
                </li>
              </ul>
            </div>
            <div class="card-body px-0">
              <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                  <div class="d-flex p-4 pt-3">
                    <div class="avatar flex-shrink-0 me-3">
                      <img src="{{ asset ('plugin/img/icons/unicons/wallet.png') }}" alt="User" />
                    </div>
                    <div>
                      <small class="text-muted d-block">Total Balance</small>
                      <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-1">$459.10</h6>
                        <small class="text-success fw-semibold">
                          <i class="bx bx-chevron-up"></i>
                          42.9%
                        </small>
                      </div>
                    </div>
                  </div>
                  <div id="incomeChart"></div>
                  <div class="d-flex justify-content-center pt-4 gap-2">
                    <div class="flex-shrink-0">
                      <div id="expensesOfWeek"></div>
                    </div>
                    <div>
                      <p class="mb-n1 mt-1">Expenses This Week</p>
                      <small class="text-muted">$39 less than last week</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Expense Overview -->

        <!-- Transactions -->
        
        <!--/ Transactions -->
      </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
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
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div> --}}
@endsection
@push('js')
<script>
  // Line Chart SK perbulan
    var options = {
          series: [
          {
            name: "Progres SK ",
            data: <?php echo json_encode($skbulan); ?>
          }
        ],
          chart: {
          height: 350,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: <?php echo json_encode($months); ?>,
          title: {
            text: 'Bulan'
          }
        },
        yaxis: {
          title: {
            text: 'SK'
          },
          min: 2,
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

        var linesk = new ApexCharts(document.querySelector("#linesk"), options);
        linesk.render();
 
  // Bar Chart Jenis Surat
    var options = {
          series: [{
          data: <?php echo json_encode($skjenis); ?>
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: <?php echo json_encode($kodesk); ?>
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

        var barsk = new ApexCharts(document.querySelector("#barsk"), options);
        barsk.render();

// Column chart Perbandingan Pekerjaan
  var options = {
          series: [{
          name: 'Jenis Pekerjaan',
          data:  <?php echo json_encode($wargajp); ?>
        }],
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          width: 2
        },
        
        grid: {
          row: {
            colors: ['#fff', '#f2f2f2']
          }
        },
        xaxis: {
          labels: {
            rotate: -45,
            style: {
              fontSize: '12px', // Mengatur ukuran font kategori
            }
          },
          categories: <?php echo json_encode($jp); ?>,
          tickPlacement: 'on'
        },
        yaxis: {
          title: {
            text: 'Total',
          },
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
          },
        }
        };

        var columnjk = new ApexCharts(document.querySelector("#columnjk"), options);
        columnjk.render();

  // Pie Chart Jenis Kelamin dan anak
    var options = {
          series: <?php echo json_encode($wargajk); ?>,
          chart: {
          width: 330,
          type: 'pie',
        },
        colors: ['#93C3EE', '#E5C6A0', '#669DB5', '#94A74A'],
        fill: {
          type: 'image',
          opacity: 0.85,
          image: {
            src: [`${window.location.origin}/plugin/img/avatars/men.png`, `${window.location.origin}/plugin/img/avatars/women.png`],
            width: 25,
            imagedHeight: 25
          },
        },
        stroke: {
          width: 4
        },
        labels: <?php echo json_encode($jk); ?>,
        dataLabels: {
          enabled: true,
          style: {
            colors: ['#111']
          },
          background: {
            enabled: true,
            foreColor: '#fff',
            borderWidth: 0
          },
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom',
            }
          }
        }]
        };

        var donutjk = new ApexCharts(document.querySelector("#donutjk"), options);
        donutjk.render();
      
</script>


@endpush