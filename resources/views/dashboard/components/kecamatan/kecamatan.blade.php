@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kecamatan Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Data Dasar</a></li>
                        <li class="breadcrumb-item active">Kecamatan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-6 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true">Manual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false">Import Excel</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="card col-12">
                                            <div class="card-body">
                                                <button class="btn btn-success mb-5" id="addBtn" data-bs-toggle="modal"
                                                    data-bs-target="#formModal">Tambah
                                                    Data <i class="bi bi-plus-lg"></i></button>
                                                <div class="">
                                                    <table class="table table-hover data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kecamatan</th>
                                                                <th>Delete</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="card col-12">
                                            <div class="card-body">
                                                <div class="mb-4 row">
                                                    <div class="col-md-6" style="height: 40px">
                                                        <button class="btn btn-success" id="btnExcel">Tambah
                                                            Data <i class="bi bi-plus-lg"></i></button>
                                                        <button class="btn btn-primary" id="importBtn"
                                                            data-bs-toggle="modal" data-bs-target="#importModal">Import
                                                        </button>
                                                        <a href="{{ route('export.kecamatan') }}"
                                                            class="btn btn-secondary">Export</a>
                                                    </div>
                                                </div>
                                                <div class="mb-5">
                                                    <table class="table table-hover datatable-excel">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Puskesmas</th>
                                                                <th>Laki - Laki</th>
                                                                <th>Perempuan</th>
                                                                <th>L + P</th>
                                                                <th>Rumah Tangga</th>
                                                                <th>Luas Wilayah</th>
                                                                <th>Delete</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($data_excel as $data)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $data->puskesmas }}</td>
                                                                    <td>{{ number_format($data->lakilaki, 0) }}</td>
                                                                    <td>{{ number_format($data->perempuan, 0) }}</td>
                                                                    <td>{{ number_format($data->total, 0) }}</td>
                                                                    <td>{{ number_format($data->rumah_tangga, 0) }}</td>
                                                                    <td>{{ number_format($data->luas_wilayah, 0) }}</td>
                                                                    <td>
                                                                        <a href="" data-toggle="tooltip"  data-id_kecamatan_excel="'.$row->id_kecamatan_excel.'" data-original-title="Edit"data-bs-toggle="modal"
                                                                            data-bs-target="#excelModal" class="btn btn-sm btn-warning btn-icon-text editDataExcel">Edit <i
                                                                            class="bi bi-pencil-square"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>


    {{-- Modal Input --}}
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
                    <form id="formData" name="formData">
                        <input type="hidden" name="id_kec" id="id_kec">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_kecamatan"
                                            name="nama_kecamatan" required />
                                    </div>
                                </div>
                            </div>
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
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save Data</button>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Import --}}
    <div class="modal fade" id="importModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="modelHeading">Import Excel</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('import.kecamatan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="kecamatan">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-close"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    //!Modal Input Excel Manual
    <div class="modal fade" id="excelModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="modelHeadingExcel"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formDataExcel" name="formDataExcel">
                        <input type="hidden" name="id_kecamatan_excel" id="id_kecamatan_excel">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Puskesmas</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="puskesmas" name="puskesmas"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Laki - Laki</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="lakilaki" name="lakilaki"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Perempuan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="perempuan" name="perempuan"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rumah Tangga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="rumah_tangga" name="rumah_tangga"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Luas Wilayah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="luas_wilayah" name="luas_wilayah"
                                            required />
                                    </div>
                                </div>
                            </div>
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
                    <button type="submit" class="btn btn-primary" id="saveExcel">Save Data</button>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.path.jquery')

    <script>
        $(function() {
            //! Jquery Kecamatan
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kecamatan.index') }}",
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData.defunct_ind == "Y") {
                        $(nRow).addClass("table-danger");
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_kecamatan',
                        name: 'nama_kecamatan'
                    },
                    {
                        data: function(data) {
                            if (data.defunct_ind == "Y") {
                                return '<i class="bi bi-check-lg"></i>';
                            }
                            return '';
                        },
                        name: 'defunct_ind'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#addBtn').click(function() {
                $('#saveBtn').val("create-data");
                $('#id_kecamatan').val('');
                $('#formData').trigger("reset");
                $('#modelHeading').html("Create New Data Kecamatan");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_kec = $("#id_kec").val();
                var nama_kecamatan = $("#nama_kecamatan").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('kecamatan.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kec: id_kec,
                        nama_kecamatan: nama_kecamatan,
                        defunct_ind: defunct_ind
                    },
                    type: "POST",
                    success: function(data) {
                        $('.modal-close').click();
                        $('#formData').trigger("reset");
                        $('#formModel').modal('hide');
                        table.draw();
                        Swal.fire(
                            'Success',
                            '',
                            'success'
                        );
                    },
                })
            });

            $('body').on('click', '.editData', function() {
                var id_kec = $(this).data('id_kec');
                $.ajax({
                    type: "POST",
                    url: "{{ route('kecamatan.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kec: id_kec
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Kecamatan");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_kec').val(data.id_kec);
                        $('#nama_kecamatan').val(data.nama_kecamatan);
                        if (data.defunct_ind == "Y") {
                            document.getElementById("defunct_ind").checked = true;
                        } else {
                            document.getElementById("defunct_ind").checked = false;
                        }
                    }
                });
            });

            // var tableExcel = $('.datatable-excel').DataTable();

            var tableExcel = $('.datatable-excel').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kecamatan.excel.index') }}",
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData.defunct_ind == "Y") {
                        $(nRow).addClass("table-danger");
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'puskesmas',
                        name: 'puskesmas'
                    },
                    {
                        data: 'lakilaki',
                        name: 'lakilaki'
                    },
                    {
                        data: 'perempuan',
                        name: 'perempuan'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'rumah_tangga',
                        name: 'rumah_tangga'
                    },
                    {
                        data: 'luas_wilayah',
                        name: 'luas_wilayah'
                    },
                    {
                        data: function(data) {
                            if (data.defunct_ind == "Y") {
                                return '<i class="bi bi-check-lg"></i>';
                            }
                            return '';
                        },
                        name: 'defunct_ind'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#btnExcel').click(function() {
                $('#saveExcel').val("create-data");
                $('#id_kecamatan_excel').val('');
                $('#formDataExcel').trigger("reset");
                $('#modelHeadingExcel').html("Add Manual Data");
                $('#excelModal').modal('show');
            });

            $('#saveExcel').click(function(e) {
                e.preventDefault();
                var id_kecamatan_excel = $("#id_kecamatan_excel").val();
                var puskesmas = $("#puskesmas").val();
                var lakilaki = $("#lakilaki").val();
                var perempuan = $("#perempuan").val();
                var rumah_tangga = $("#rumah_tangga").val();
                var luas_wilayah = $("#luas_wilayah").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('kecamatan.excel.create') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kecamatan_excel: id_kecamatan_excel,
                        puskesmas: puskesmas,
                        lakilaki: lakilaki,
                        perempuan: perempuan,
                        rumah_tangga: rumah_tangga,
                        luas_wilayah: luas_wilayah,
                        defunct_ind: defunct_ind
                    },
                    type: "POST",
                    success: function(data) {
                        $('.modal-close').click();
                        $('#formDataExcel').trigger("reset");
                        $('#excelModal').modal('hide');
                        tableExcel.draw();
                        Swal.fire(
                            'Success',
                            '',
                            'success'
                        );
                    },
                })
            });

            $('body').on('click', '.editDataExcel', function() {
                var id_kecamatan_excel = $(this).data('id_kecamatan_excel');
                $.ajax({
                    type: "POST",
                    url: "{{ route('kecamatan.excel.update') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kecamatan_excel: id_kecamatan_excel
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeadingExcel').html("Edit Data Kecamatan");
                        $('#saveExcel').val("edit-data");
                        $('#excelModal').modal('show');
                        $('#id_kecamatan_excel').val(data.id_kecamatan_excel);
                        $('#puskesmas').val(data.puskesmas);
                        $('#lakilaki').val(data.lakilaki);
                        $('#perempuan').val(data.perempuan);
                        $('#rumah_tangga').val(data.rumah_tangga);
                        $('#luas_wilayah').val(data.luas_wilayah);
                        if (data.defunct_ind == "Y") {
                            document.getElementById("defunct_ind").checked = true;
                        } else {
                            document.getElementById("defunct_ind").checked = false;
                        }
                    }
                });
            });

        });
    </script>
@endsection
