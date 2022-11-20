<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Pelalawan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link href='{{ url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="{{ url('//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css') }}">
    <!-- CSS only -->
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/dashboard/images/favicon.ico" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('dashboard.partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('dashboard.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('container')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                            2022</span>
                        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">STMIK Amik Riau</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('assets/dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="{{ url('assets/dashboard/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('assets/dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ url('assets/js/dashboard.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/todolist.js') }}"></script>
    <script src="{{ url('https://unpkg.com/boxicons@2.1.4/dist/boxicons.js') }}"></script>
    <script src="{{ url('//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <!-- End custom js for this page -->
</body>

</html>
