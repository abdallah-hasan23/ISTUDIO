<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', env('APP_NAME'))</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('back-end/./css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
      :root {
        --primary-color: #0d6b68;
        --primary-hover: #0a5653;
        --bg-light: #e6f0ef;
        --secondary-bg: #dde9e9;
        --dark-color: #03201f;
        --text-muted: #5c7271;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        --btn-radius: 10px;
        --card-radius: 16px;
      }

      body {
        font-family: 'Outfit', sans-serif !important;
        background-color: var(--bg-light) !important;
        color: var(--dark-color);
      }

      /* Navbar Enhancements */
      .app-header {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--secondary-bg) !important;
        padding: 0.5rem 1rem;
      }

      .nav-link {
        color: var(--dark-color) !important;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .nav-link:hover {
        color: var(--primary-color) !important;
      }

      /* Sidebar Enhancements */
      .app-sidebar {
        background-color: var(--dark-color) !important;
        border-right: none !important;
        box-shadow: 10px 0 30px rgba(0, 0, 0, 0.1) !important;
      }

      .sidebar-brand {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 1.5rem !important;
      }

      .brand-text {
        font-weight: 700 !important;
        letter-spacing: 1px;
        color: #fff !important;
      }

      .sidebar-menu .nav-link {
        color: rgba(255, 255, 255, 0.7) !important;
        padding: 0.8rem 1.5rem !important;
        margin: 0.2rem 0.8rem !important;
        border-radius: 10px !important;
        font-size: 0.95rem;
      }

      .sidebar-menu .nav-link:hover, .sidebar-menu .nav-link.active {
        background-color: var(--primary-color) !important;
        color: #fff !important;
      }

      .sidebar-menu .nav-link i {
        margin-right: 10px;
        font-size: 1.1rem;
      }

      /* Card & Content Redesign */
      .app-main {
        padding: 1.5rem;
      }

      .card {
        border: none !important;
        border-radius: var(--card-radius) !important;
        box-shadow: var(--card-shadow) !important;
        margin-bottom: 1.5rem;
        overflow: hidden;
      }

      .card-header {
        background: #fff !important;
        border-bottom: 1px solid var(--secondary-bg) !important;
        padding: 1.25rem !important;
      }

      .card-title {
        font-weight: 600 !important;
        color: var(--dark-color);
      }

      /* Button Enhancements */
      .btn-primary {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        border-radius: var(--btn-radius) !important;
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .btn-primary:hover {
        background-color: var(--primary-hover) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 107, 104, 0.3);
      }

      /* Table Enhancements */
      .table {
        border-collapse: separate;
        border-spacing: 0 8px;
        background-color: transparent !important;
      }

      .table thead th {
        background-color: transparent !important;
        border: none !important;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
      }

      .table tbody tr {
        background-color: #fff !important;
        transition: all 0.2s ease;
      }

      .table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      }

      .table td {
        border: none !important;
        padding: 1.2rem 1rem !important;
        vertical-align: middle;
      }

      .table td:first-child { border-radius: 12px 0 0 12px; }
      .table td:last-child { border-radius: 0 12px 12px 0; }

      /* Badge Enhancements */
      .badge {
        padding: 0.5em 1em !important;
        border-radius: 6px !important;
        font-weight: 500 !important;
      }

      /* Breadcrumb */
      .breadcrumb-item a {
        color: var(--primary-color) !important;
        text-decoration: none;
      }

      /* Form Enhancements */
      .form-control, .form-select {
        border-radius: 10px !important;
        border: 1px solid var(--secondary-bg) !important;
        padding: 0.75rem 1rem !important;
        transition: all 0.3s ease !important;
        background-color: #fcfdfd !important;
      }

      .form-control:focus, .form-select:focus {
        border-color: var(--primary-color) !important;
        box-shadow: 0 0 0 4px rgba(13, 107, 104, 0.1) !important;
        background-color: #fff !important;
      }

      label {
        font-weight: 500 !important;
        margin-bottom: 0.5rem !important;
        color: var(--dark-color) !important;
      }

      /* Custom Scrollbar */
      ::-webkit-scrollbar { width: 6px; }
      ::-webkit-scrollbar-track { background: var(--bg-light); }
      ::-webkit-scrollbar-thumb { background: var(--secondary-bg); border-radius: 10px; }
      ::-webkit-scrollbar-thumb:hover { background: var(--primary-color); }
    </style>
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('back-end/./css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    @yield('css')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="{{ route('admin.index') }}" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">

            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img
                  src="https://ui-avatars.com/api/?name={{ implode('', array_map(function($part) { return substr($part, 0, 1); }, explode(' ', auth()->user()->name))) }}&size=160&background=0d6b68&color=fff"
                  class="user-image rounded-circle border"
                  alt="User Image"
                  style="width: 35px; height: 35px;"
                />
                <span class="d-none d-md-inline ms-2">{{ auth()->user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow border-0" style="border-radius: 12px; overflow: hidden;">
                <!--begin::User Image-->
                <li class="user-header" style="background-color: var(--primary-color); color: white;">
                  <img
                  src="https://ui-avatars.com/api/?name={{ implode('', array_map(function($part) { return substr($part, 0, 1); }, explode(' ', auth()->user()->name))) }}&size=160&background=fff&color=0d6b68"
                  class="user-image rounded-circle shadow-sm mb-2"
                  alt="User Image"
                />
                  <p>
                    {{ auth()->user()->name  }}
                    <small class="d-block opacity-75">{{ auth()->user()->type }}</small>
                    <small>Member since {{ auth()->user()->created_at->format('M, Y') }}</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body p-3">
                  <div class="d-grid gap-2">
                      <a href="{{ route('admin.profile') }}" class="btn btn-light border w-100">
                        <i class="bi bi-person me-2"></i> Profile
                      </a>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">
                          <i class="bi bi-box-arrow-right me-2"></i> Sign out
                        </button>
                      </form>
                  </div>
                </li>
                <!--end::Menu Body-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ url('/') }}" class="brand-link text-decoration-none">
            <!--begin::Brand Text-->
            <span class="brand-text fs-4 uppercase">ISTUDIO</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                  <i class="bi bi-house-heart-fill"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.projects.index') }}" class="nav-link">
                  
                  <i class="bi bi-bag-heart-fill"></i>
                  <p>Projects</p>
                </a>
              </li><li class="nav-item">
                <a href="{{ route('admin.services.index') }}" class="nav-link">
                  <i class="bi bi-suit-heart-fill"></i>
                  <p>Services</p>
                </a>
              </li></li><li class="nav-item">
                <a href="{{ route('admin.team.index') }}" class="nav-link">
                  <i class="bi bi-people-fill"></i>
                  <p>Team Members</p>
                </a>
              </li></li></li><li class="nav-item">
                <a href="{{ route('admin.about.index') }}" class="nav-link">
                  <i class="bi bi-patch-exclamation-fill"></i>
                  <p>About Us</p>
                </a>
              </li></li></li></li><li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                  <i class="bi bi-chat-left-heart-fill"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}" class="nav-link">
                  <i class="bi bi-gear-fill"></i>
                  <p>Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.messages.index') }}" class="nav-link">
                  <i class="bi bi-chat-right-text-fill"></i>
                  <p>Messages</p>
                </a>
              </li>
              {{-- <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Theme Generate</p>
                </a>
              </li> --}}

              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              
              <div class="col-sm-12">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb', 'Dashboard')</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="container-fluad mx-4">
          @yield('content')

        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('back-end/./js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>

    @yield('js')

    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
