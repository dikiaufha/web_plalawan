@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Dokter Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-inverse-success mb-5" data-bs-toggle="modal"
                        data-bs-target="#formModal">Tambah Data <i class="mdi mdi-plus"></i></a>
                    <table class="table table-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Alamat</th>
                                <th>Delete</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $key => $data)
                                @if ($data->defunct_ind == 'Y')
                                    <tr class="table-danger">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->name_dokter }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td><i class="mdi mdi-check"></i></td>
                                        <td><button></button></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->name_dokter }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td></td>
                                        <td><button></button></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Dokter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nameDokter" name="nameDokter"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamatDokter" name="alamatDokter"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-sm-3 col-form-label">Delete</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="form-check-input form-check-danger" value="Y"
                                            name="defunctInd" id="defunctInd">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="addDokter()">Save Data</button>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.path.jquery')

    <script>
        $(document).ready(function() {
            table();
        });

        function table() {
            $('#table-data').DataTable({
                fixedHeader: true,
            });
        }

        function addDokter() {
            var nameDokter = $("#nameDokter").val();
            var alamatDokter = $("#alamatDokter").val();
            var defunctInd = $("#defunctInd").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('add.dokter') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_dokter: nameDokter,
                    alamat: alamatDokter,
                    defunct_ind: defunctInd
                },
                success: function(data) {
                    $(".modal-close").click();
                    Swal.fire(
                        'Success',
                        'Data Berhasil Di tambahkan',
                        'success'
                    );
                    table();
                }
            });
        }
    </script>
@endsection
