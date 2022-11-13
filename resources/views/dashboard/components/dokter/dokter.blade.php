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
                <div class="card-body" id="readData">
                    <button class="btn btn-inverse-success mb-5" data-bs-toggle="modal" data-bs-target="#formModal">Tambah
                        Data <i class="mdi mdi-plus"></i></button>
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
                                <tr @if ($data->defunct_ind == 'Y') class="table-danger" @endif>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->name_dokter }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>
                                        @if ($data->defunct_ind == 'Y')
                                            <i class="mdi mdi-check"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-gradient-info btn-icon-text"
                                            onclick="showDokter({{ $data->dokter_id }})">Edit <i
                                                class="mdi mdi-file-check btn-icon-append"></i></a>
                                    </td>
                                </tr>
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
                    <h1 class="modal-title fs-5" id="modelHeading"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dokterForm" name="dokterForm">
                        <input type="hidden" name="dokter_id" id="dokter_id">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name_dokter" name="name_dokter"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat Dokter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat" name="alamat" required />
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
                                            name="defunct_ind" id="defunct_ind">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="addDokter()">Save Data</button>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.path.jquery')

    <script>
        $(document).ready(function() {
            readDokter()
        });

        function readDokter() {
            $.get("{{ route('dokter.home') }}", {}, function(data, status) {
                $('#table-data').DataTable({
                    searching: true,
                    paging: true,
                    "bDestroy": true
                });
            });
        }

        function addDokter() {
            var name_dokter = $("#name_dokter").val();
            var alamat = $("#alamat").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('dokter.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_dokter: name_dokter,
                    alamat: alamat,
                    defunct_ind: defunct_ind
                },
                success: function(data) {
                    $(".modal-close").click();
                    Swal.fire(
                        'Success',
                        'Data Berhasil Di tambahkan',
                        'success'
                    );
                    clearForm();
                    readDokter();
                }
            });
        }
    </script>
@endsection
