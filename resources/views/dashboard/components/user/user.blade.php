@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Authorization Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Authorization</a></li>
                        <li class="breadcrumb-item active">Auth</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-12">
                    <div class="card-body">
                        <button class="btn btn-success mb-5" id=" addBtn"onClick="create()">Tambah
                            Data <i class="bi bi-plus-lg"></i></button>
                        <div id="read"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal --}}
    <div class="modal fade" id="formModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="modelHeading"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="page"></div>
                </div>


            </div>
        </div>
    </div>
    @include('dashboard.path.jquery')

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('#icon').addClass("bi bi-eye-slash");
            } else {
                x.type = "password";
                $('#icon').removeClass("bi bi-eye-slash");
            }
        }
        $(document).ready(function() {
            read();
        });

        function read() {
            $.get("{{ url('user-read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('user-create') }}", {}, function(data, status) {
                $("#modelHeading").html('Add Data Authorization');
                $("#page").html(data);
                $("#formModal").modal('show');
            });
        }

        // untuk    proses create data
        function store() {
            var nama = $("#nama").val();
            var role = $("#role").val();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                type: "get",
                url: "{{ url('user-store') }}",
                data: {
                    nama : nama,
                    role : role,
                    email : email,
                    password : password
                },
                success: function(data) {
                    $(".modal-close").click();
                    Swal.fire(
                            'Success',
                            '',
                            'success'
                        );
                    read();

                }
            });
        }

        // untuk halaman edit
        function show(id) {
            $.get("{{ url('user-show') }}/" + id, {}, function(data, status) {
                $("#modelHeading").html('Edit Product');
                $("#page").html(data);
                $("#formModal").modal('show');
            });
        }

        // untuk proses update   data
        function update(id) {
            var nama = $("#nama").val();
            var role = $("#role").val();
            var email = $("#email").val();
            $.ajax({
                type: "get",
                url: "{{ url('user-update') }}/" + id,
                data: {
                    nama : nama,
                    role : role,
                    email : email,
                },
                success: function(data) {
                    $(".modal-close").click();
                    Swal.fire(
                            'Success',
                            '',
                            'success'
                        );
                    read();
                }
            });
        }

        // untuk proses hapus data
        function destroy(id) {
            var nama = $("#nama").val();
            var role = $("#role").val();
            var email = $("#email").val();
            var password = $("#password").val();
            confirm("Apakah yakin untuk hapus data?");
                $.ajax({
                    type: "get",
                    url: "{{ url('user-destroy') }}/" + id,
                    data: {
                        nama : nama,
                        role : role,
                        email : email,
                        password : password
                    },
                    success: function(data) {
                        $(".modal-close").click();
                        Swal.fire(
                            'Success',
                            '',
                            'success'
                        );
                        read();
                    }
                });
        }
    </script>
@endsection
