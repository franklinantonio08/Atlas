<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Option 1: CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">

    <!-- Option 2: CoreUI PRO for Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.4/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-B25jn3HrWNnbfszQBjQT5iHKf8BuG+Og9Al4zXNJgLl6orefC7UQYjD/Uxo1jMis" crossorigin="anonymous"> -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
<link rel="stylesheet" href="css/vendors/simplebar.css">

<link href="css/style.css" rel="stylesheet">

<link href="css/examples.css" rel="stylesheet">
<script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
    </script>
<link href="{{ asset('vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
  </head>
  <body>

        @include('includes.navadmin')

        @include('includes.headermenuadmin')
        
        <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="fs-2 fw-semibold">Dashboard</div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                  <span>Home</span>
                </li>
                <li class="breadcrumb-item active">
                  <span>Dashboard</span>
                </li>
              </ol>
            </nav>


        <div class="row">
          <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-body p-4">
                      <div class="row">
                          <div class="col">
                            <div class="card-title fs-4 fw-semibold">Atenciones</div>
                            <div class="card-subtitle text-disabled">{{ $primeraSolicitud }} - {{ $ultimaSolicitud }}  {{ $year }}</div>
                          </div>
                          <div class="col text-end text-primary fs-4 fw-semibold">{{ $totalSolicitudes }}</div>
                      </div>
                    </div>
                      <div class="chart-wrapper mt-3" style="height:150px;">
                      <canvas class="chart" id="card-chart-new1" height="75"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="card-title text-disabled">Customers</div>
                        <div class="bg-primary bg-opacity-25 text-primary p-2 rounded">
                          <svg class="icon icon-xl">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                          </svg>
                        </div>
                      </div>
          
                    <div class="fs-4 fw-semibold pb-3">44.725</div>
                      <small class="text-danger">(-12.4%
                        <svg class="icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                        </svg>)
                      </small>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="card-title text-disabled">Orders</div>
                          <div class="bg-primary bg-opacity-25 text-primary p-2 rounded">
                            <svg class="icon icon-xl">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                            </svg>
                          </div>
                      </div>
                  
                      <div class="fs-4 fw-semibold pb-3">385</div>
                        <small class="text-success">(17.2%
                          <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                          </svg>)
                        </small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body p-4">
                    <div class="card-title fs-4 fw-semibold">Trafico Mensual</div>
                    <div class="card-subtitle text-disabled">{{ $primeraSolicitud }} - {{ $ultimaSolicitud }}  {{ $year }}</div>
                    <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                      <canvas class="chart" id="main-bar-chart" height="300"></canvas>
                    </div>
                  </div>
                </div>
              </div>
        </div>


        <div class="row">
        <div class="col-lg-9">
        <div class="card mb-4">
        <div class="card-body p-4">
        <div class="row">
        <div class="col">
        <div class="card-title fs-4 fw-semibold">Funcionarios</div>
        <div class="card-subtitle text-disabled mb-4">1.232.150 Consumidores registrados</div>
        </div>
        <div class="col-auto ms-auto">
        <button class="btn btn-secondary">
        <svg class="icon me-2">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
        </svg>Add new user
        </button>
        </div>
        </div>
        <div class="table-responsive">
        <table class="table mb-0">
        <thead class="fw-semibold text-disabled">
        <tr class="align-middle">
        <th class="text-center">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
        </svg>
        </th>
        <th>User</th>
        <th class="text-center">Country</th>
        <th>Usage</th>
        <th>Activity</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="align-middle">
        <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/1.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
        </td>
        <td>
        <div>Yiorgos Avraamu</div>
        <div class="small text-disabled"><span>New</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-us') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">50%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-success bg-opacity-15">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">10 sec ago</div>
        </td>
        <td>
        <div class="dropdown">
         <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        <tr class="align-middle">
        <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/2.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-danger-gradient"></span></div>
        </td>
        <td>
        <div>Avram Tarasios</div>
        <div class="small text-disabled"><span>Recurring</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-br') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">10%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-primary bg-opacity-15">
        <div class="progress-bar bg-primary-gradient" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">5 minutes ago</div>
        </td>
        <td>
        <div class="dropdown">
        <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        <tr class="align-middle">
        <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/3.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-warning-gradient"></span></div>
        </td>
        <td>
        <div>Quintin Ed</div>
        <div class="small text-disabled"><span>New</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-in') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">74%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-warning bg-opacity-15">
        <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">1 hour ago</div>
        </td>
        <td>
        <div class="dropdown">
        <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        <tr class="align-middle">
        <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/4.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-secondary-gradient"></span></div>
        </td>
        <td>
        <div>Enéas Kwadwo</div>
        <div class="small text-disabled"><span>New</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-fr') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">98%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-danger bg-opacity-15">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">Last month</div>
        </td>
        <td>
        <div class="dropdown">
        <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        <tr class="align-middle">
         <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/5.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
        </td>
        <td>
        <div>Agapetus Tadeáš</div>
        <div class="small text-disabled"><span>New</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-es') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">22%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-info bg-opacity-15">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">Last week</div>
        </td>
        <td>
        <div class="dropdown dropup">
        <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        <tr class="align-middle">
        <td class="text-center">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('images/6.jpeg') }}" alt="user@email.com"><span class="avatar-status bg-danger-gradient"></span></div>
        </td>
        <td>
        <div>Friderik Dávid</div>
        <div class="small text-disabled"><span>New</span> | Registered: Jan 1, 2020</div>
        </td>
        <td class="text-center">
        <svg class="icon icon-xl">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/flag.svg#cif-pl') }}"></use>
        </svg>
        </td>
        <td>
        <div class="d-flex justify-content-between mb-1">
        <div class="fw-semibold">43%</div><small class="text-disabled">Jun 11, 2020 - Jul 10, 2020</small>
        </div>
        <div class="progress progress-thin bg-success bg-opacity-15">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
        <div class="small text-disabled">Last login</div>
        <div class="fw-semibold">Yesterday</div>
        </td>
        <td>
        <div class="dropdown dropup">
        <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        <div class="col-lg-3">
        <div class="card mb-4 text-white bg-primary-gradient">
        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
        <div>
        <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
        </svg>)</span></div>
        <div>Users</div>
        </div>
        <div class="dropdown">
        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
        </div>
        </div>
        <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
        <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
        </div>
        <div class="card mb-4 text-white bg-warning-gradient">
        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
        <div>
        <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
        </svg>)</span></div>
        <div>Conversion Rate</div>
        </div>
        <div class="dropdown">
        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
        </div>
        </div>
        <div class="chart-wrapper mt-3" style="height:80px;">
        <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
        </div>
        <div class="card mb-4 text-white bg-danger-gradient">
        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
        <div>
        <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
        <svg class="icon">
         <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
        </svg>)</span></div>
        <div>Sessions</div>
        </div>
        <div class="dropdown">
        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg class="icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
        </svg>
        </button>
        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
        </div>
        </div>
        <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
        <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
        </div>
        </div>
        </div>

        
        <!--div class="row">
        <div class="col-md-12">
        <div class="card mb-4">
        <div class="card-body p-4">
        <div class="card-title fs-4 fw-semibold">Traffic</div>
        <div class="card-subtitle text-disabled border-bottom mb-3 pb-4">Last Week</div>
        <div class="row">
        <div class="col-sm-6">
        <div class="row">
        <div class="col-6">
        <div class="border-start border-start-4 border-start-info px-3 mb-3"><small class="text-disabled">New Clients</small>
        <div class="fs-5 fw-semibold">9.123</div>
        </div>
        </div>
        
        <div class="col-6">
        <div class="border-start border-start-4 border-start-danger px-3 mb-3"><small class="text-disabled">Recuring Clients</small>
        <div class="fs-5 fw-semibold">22.643</div>
        </div>
        </div>
        
        </div>
        
        <div class="progress-group mb-4 pt-4 border-top">
        <div class="progress-group-prepend"><span class="text-disabled small">Monday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Tuesday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Wednesday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Thursday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 91%" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Friday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 73%" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Saturday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 53%" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-4">
        <div class="progress-group-prepend"><span class="text-disabled small">Sunday</span></div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>
        
        <div class="col-sm-6">
        <div class="row">
        <div class="col-6">
        <div class="border-start border-start-4 border-start-warning px-3 mb-3"><small class="text-disabled">Pageviews</small>
        <div class="fs-5 fw-semibold">78.623</div>
        </div>
        </div>
        
        <div class="col-6">
        <div class="border-start border-start-4 border-start-success px-3 mb-3"><small class="text-disabled">Organic</small>
        <div class="fs-5 fw-semibold">49.123</div>
        </div>
        </div>
        
        </div>
        
        <div class="progress-group mb-4 pt-4 border-top">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg>
        <div>Male</div>
        <div class="ms-auto fw-semibold">43%</div>
        </div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group mb-5">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female"></use>
        </svg>
        <div>Female</div>
        <div class="ms-auto fw-semibold">37%</div>
        </div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-google') }}"></use>
        </svg>
        <div>Organic Search</div>
        <div class="ms-auto fw-semibold me-2">191.235</div>
        <div class="text-disabled small">(56%)</div>
        </div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-facebook-f') }}"></use>
        </svg>
        <div>Facebook</div>
        <div class="ms-auto fw-semibold me-2">51.223</div>
        <div class="text-disabled small">(15%)</div>
        </div>
        <div class="progress-group-bars">
         <div class="progress progress-thin">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-twitter') }}"></use>
        </svg>
        <div>Twitter</div>
        <div class="ms-auto fw-semibold me-2">37.564</div>
        <div class="text-disabled small">(11%)</div>
        </div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        <div class="progress-group">
        <div class="progress-group-header">
        <svg class="icon icon-lg me-2">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/brand.svg#cib-linkedin') }}"></use>
        </svg>
        <div>LinkedIn</div>
        <div class="ms-auto fw-semibold me-2">27.319</div>
        <div class="text-disabled small">(8%)</div>
        </div>
        <div class="progress-group-bars">
        <div class="progress progress-thin">
        <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>
        
        </div>
        
        </div>
        </div>
        </div>
        
        </div-->
        
        </div>
        </div>
        <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI PRO UI Components</a></div>
        </footer>
      
        
        <script src="vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
        <script src="vendors/simplebar/js/simplebar.min.js"></script>
        <script>
              if (document.body.classList.contains('dark-theme')) {
                var element = document.getElementById('btn-dark-theme');
                if (typeof(element) != 'undefined' && element != null) {
                  document.getElementById('btn-dark-theme').checked = true;
                }
              } else {
                var element = document.getElementById('btn-light-theme');
                if (typeof(element) != 'undefined' && element != null) {
                  document.getElementById('btn-light-theme').checked = true;
                }
              }
        
              function handleThemeChange(src) {
                var event = document.createEvent('Event');
                event.initEvent('themeChange', true, true);
        
                if (src.value === 'light') {
                  document.body.classList.remove('dark-theme');
                }
                if (src.value === 'dark') {
                  document.body.classList.add('dark-theme');
                }
                document.body.dispatchEvent(event);
              }
            </script>
        
        <script src="{{ asset('vendors/chart.js/js/chart.min.js') }}"></script>
        <script src="{{ asset('vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
        <script src="{{ asset('vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script>
            </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script> --}}

    <!-- Option 2: CoreUI PRO for Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.4/dist/js/coreui.bundle.min.js" integrity="sha384-PXCF+7AmSRaBre024Vj/351upY3ItGUEnFXlXC/dzueNTk5I2xipIib6qgx3GRjw" crossorigin="anonymous"></script> --}}

    <!-- Option 3: Separate Popper and CoreUI/CoreUI PRO  for Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity=" sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.min.js" integrity="sha384-2hww80ziDjQXYpFulPf5tfdCCXLTxn70HdSwL9MfeEvpS0kjfHd1iaBRsLpnuaSC" crossorigin="anonymous"></script>
    or
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.4/dist/js/coreui.min.js" integrity="sha384-WKICWLKiGYGo9MnQV6DZZno4M501Ru9jJGvYE9v66X/wp+vWZpJL3y2TJzlT7VIr" crossorigin="anonymous"></script>
    -->
  </body>
</html>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
 <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.3.9/simplebar.css" integrity="sha512-iYpx9HVem1HUXRdrfRQLXJuwrG5DYNWt1aAOsYkFb0ZB04zodzrlgojJTFZP/xVrkPkF/dJXohBwjc8xDl9S7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

       
    
       

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>


    <div class="sidebar sidebar-dark sidebar-fixed bg-dark-gradient" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="{{ asset('brand/coreui.svg#signet') }}"></use>
        </svg>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>


            <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
                <li class="nav-title">Components</li>
                    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                            
                        </svg> Base</a>
                            <ul class="nav-group-items">
                                <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span> Accordion</a></li>
                                <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span> Breadcrumb</a></li>
                                <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span> Cards</a></li>
                                <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span class="nav-icon"></span> Carousel</a></li>
                                <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span class="nav-icon"></span> Collapse</a></li>
                            </ul>
                    </li>
            </ul>
        </div>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.3.9/simplebar.min.js" integrity="sha512-xAAb5tNhb12Tx88hMa8IdJI+3pzHBk4V4sQ4w8FIFkXEvlh1PYYma0oPnIENPYeLeblWavY7AlkJj3XzJlif0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>

        <!-- Option 2: CoreUI PRO for Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.3.4/dist/js/coreui.bundle.min.js" integrity="sha384-PXCF+7AmSRaBre024Vj/351upY3ItGUEnFXlXC/dzueNTk5I2xipIib6qgx3GRjw" crossorigin="anonymous"></script>
    
    
    </body>
</html> --}}
