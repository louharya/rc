<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Printer</title>
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.css') }}">
    {{-- @vite(['assets/js/sidebar.js', 'assets/vendor/datatables/jquery-3.5.1.js', 'assets/vendor/datatables/jquery.dataTables.min.js', 'assets/vendor/datatables/dataTables.bootstrap4.min.js', 'assets/vendor/datatables/dataTables.responsive.min.js', 'assets/vendor/datatables/responsive.bootstrap4.min.js']) --}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,300;1,500&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-primary border-0" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"><i class="fas fa-shopping-cart mr-1"></i></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    {{-- <div class="user-pic" style="height:70px;width:70px;">
                        <img class="img-responsive img-rounded" src="assets/images/" alt="User picture">
                    </div> --}}
                    <div class="user-info">
                        <span class="user-name">
                            <h3>{{ auth()->user()->name }}</h3>
                        </span>
                        <span class="user-role">
                            <h5>Role : {{ auth()->user()->type }}</h5>
                        </span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->

                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li>
                            <a href="/admin/index">
                                <i class="fas fa-tv"></i>
                                <span>Konfirmasi Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="/products">
                                <i class="fas fa-archive"></i>
                                <span> Tambah Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/laporan">
                                <i class="fa fa-chart-line"></i>
                                <span>Laporan Penjualan</span>
                            </a>
                        </li>
                        <li>
                            <a href="pengaturan.php">
                                <i class="fa fa-cog"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#Exit" data-toggle="modal">
                                <i class="fa fa-power-off"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <div class="sidebar-footer">

            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">

                @yield('content')
                <div class="d-block d-sm-block d-md-none d-lg-none py-2"></div>

            </div><!-- end container-fluid" -->
        </main><!-- end page-content" -->
    </div><!-- end page-wrapper -->

    <!-- Modal Exit -->
    <div class="modal fade" id="Exit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
                    <h3 class="mb-4">Apakah anda yakin ingin keluar ?</h3>
                    <button type="button" class="btn btn-secondary px-4 mr-2" data-dismiss="modal">Batal</button>
                    <a href="{{ route('logout') }}" class="btn btn-primary px-4"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Keluar') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- end Modal Exit -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/js/sidebar.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable();
            });
            $('#cart').dataTable({
                searching: false,
                paging: false,
                info: false
            });
        </script>
</body>

</html>
