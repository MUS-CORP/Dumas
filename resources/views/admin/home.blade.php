<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <title>Admin dashboard</title>

      <!-- Custom fonts for this template-->
      <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
      <!-- Custom styles for this template-->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('./assets/css/tailwind.output.css')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
      <link rel="icon" href="{{ asset('img/favicon.svg')}}" />
      <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet" />
      <script src="https://cdn.statically.io/gh/devanka761/notipin/v1.24.49/all.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
      <style>
         #error {
            height: 100vh;
            padding-top: 10rem;
            width: 100%;
            background: #f9fbfd;
         }
         #error .errors-titles {
            font-size: 10rem;
         }

         #error p {
            color: #888 !important;
         }
         * {
            box-sizing: border-box;
         }
         body {
            background-color: #2b4865;
         }

         .table td,
         .table th {
            text-align: center;
            background-color: #2b4865;
            color: white;
         }

         .table th {
            background-color: #256d85;
            color: black;
         }

         .table tbody:nth-child(even) {
            background-color: #2b4865;
            color: white;
         }

         /* Ini Responsivenya */
         @media (max-width: 1080px) {
            .table thead {
               display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
               display: block;
               width: 100%;
               background-color: #2b4865;
            }

            .table tr {
               margin-bottom: 15px;
            }

            .table td {
               text-align: right;
               position: relative;
            }

            .table td::before {
               content: "";
               position: absolute;
               left: 0;
               width: 50%;
               padding-left: 15px;
               font-size: 15px;
               font-weight: bold;
               text-align: left;
            }
         }

         /* End Responsive */

         .title {
            color: #adadad;
            text-align: center;
         }

         .subtitle a {
            color: white;
            text-decoration: none;
            float: left;
            padding-top: 1px;
         }

         .subtitle a:hover {
            color: #dbd7e6;
            text-decoration: none;
         }

         @media (max-width: 500px) {
            .subtitle a {
               font-size: 15px;
               padding-top: 3px;
            }
         }

         @media (max-width: 768px) {
            .subtitle a {
               padding-top: 1px;
            }

            #error .errors-titles {
               font-size: 7rem;
            }
         }

         .btn {
            background-color: #256d85;
            color: white;
         }
      </style>
      <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
   </head>

   <body id="page-top">
      @include('sweetalert::alert')

      <div id="wrapper">
         <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #256d85; color: black">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/" style="color: white">
               <span><img src="/assets/logo1.png" alt="" style="width: 100px" /></span>
            </a>

            <hr class="sidebar-divider my-0" />
            <div class="user-profile text-center mt-3">
               <div class="mt-1">
                  <span class="text-success"><i class="bi bi-person-circle"></i> {{ Auth::user()->level }}</span>
               </div>
            </div>

            @if (Auth::user()->level == 'ADMIN')
            <li class="nav-item">
               <a class="nav-link {{ Request::is('dashboard') ? 'text-light' : '' }}" href="{{ route('dashboard') }}">
                  <i class="bi bi-collection me-2"></i>
                  <span>Dashboard</span></a
               >
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('admin/pengaduan') ? 'text-light' : '' }}" href="/admin/pengaduan">
                  <i class="bi bi-shield-exclamation"></i>
                  <i class="ri-dashboard-line"></i><span class="badge rounded-pill float-end" style="background-color: #2b4865">{{ $pending }}</span> <span>Pengaduan</span></a
               >
            </li>

            <li class="nav-item">
               <a class="nav-link {{ Request::is('admin/laporan') ? 'text-light' : '' }}" href="/admin/laporan">
                  <i class="bi bi-check-square-fill"></i>
                  <i class="ri-dashboard-line"></i><span class="badge rounded-pill float-end" style="background-color: #2b4865">{{ $success }}</span> <span>Laporan Harian</span></a
               >
            </li>
            @elseif (Auth::user()->level == 'SUPERADMIN')
            <li class="nav-item">
               <a class="nav-link {{ Request::is('dashboardsuperadmin') ? 'text-light' : '' }}" href="/dashboardsuperadmin">
                  <i class="bi bi-collection"></i>
                  <span>Dashboard</span></a
               >
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('superadmin/daftar-masyarakat') ? 'text-light' : '' }}" href="/superadmin/daftar-masyarakat">
                  <i class="bi bi-people-fill"></i>
                  <span>List Masyarakat</span></a
               >
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('superadmin/daftar-admin') ? 'text-light' : '' }}" href="/superadmin/daftar-admin">
                  <i class="bi bi-person-fill"></i>
                  <span>Admin</span></a
               >
            </li>
            @endif

            <hr class="sidebar-divider d-none d-md-block" />

            <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
         </ul>

         <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                  </button>

                  @yield('search')

                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-search fa-fw"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                              <div class="input-group">
                                 <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                 <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                       <i class="bi bi-search"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </li>

                     <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                           <img class="img-profile rounded-circle" src="/assets/images/undraw_profile.svg" />
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <a class="dropdown-item" href="/" data-toggle="modal" data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Home
                           </a>
                        </div>
                     </li>
                  </ul>
               </nav>
               <div class="container">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800"></h1>
                     @yield('button')
                  </div>
                  <div class="table-responsive">@yield("isi")</div>
               </div>

               @yield("isi2")
            </div>
         </div>
      </div>

      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">??</span>
                  </button>
               </div>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
               <div class="modal-body">Yakin mau keluar?.</div>
               <div class="modal-footer">
                  <a
                     class="btn btn-primary"
                     href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                  >
                     {{ __('Logout') }}
                  </a>
                  <a class="btn btn-primary" href="/">Kembali ke Home</a>
               </div>
            </div>
         </div>
      </div>

      <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/js/sb-admin-2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

       <script>
        @foreach($errors->all() as $error)
        Notipin.Alert({
            msg: "{{ $error }}", 
            yes: "OKE",
            
            type: "NORMAL",
            mode: "DARK",
            })
            
        @endforeach
        
    </script>
   </body>
</html>
