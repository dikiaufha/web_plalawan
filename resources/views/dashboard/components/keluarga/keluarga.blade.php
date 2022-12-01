@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Keluarga Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/dashboard">Data Jenis Organisasi</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Keluarga</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <button class="btn btn-inverse-success mb-5" id="addBtn" data-bs-toggle="modal"
                    data-bs-target="#formModal">Tambah
                    Data <i class="mdi mdi-plus"></i></button>
                <div class="table-responsive">
                    <table class="table table-hover data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>No KK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Status Perkawinan</th>
                                <th>Agama</th>
                                <th>Status Dalam Keluarga</th>
                                <th>Status JamKesDa</th>
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

    {{-- Modal --}}
    <div class="modal fade" id="formModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modelHeading"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formData" name="formData">
                        <input type="hidden" name="id_keluarga" id="id_keluarga">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nik" name="nik"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No KK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="no_kk" name="no_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option>Pilih Jenis Kelamin...</option>
                                            <option value="lakilaki">Laki - Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_status_kawin" name="id_status_kawin">
                                            <option>Pilih Status Perkawinan ...</option>
                                            @foreach ($status_kawin as $data)
                                                <option value="{{ $data->id_status_kawin }}">{{ $data->status_kawin }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_agama" name="id_agama">
                                            <option>Pilih Agama ...</option>
                                            @foreach ($agama as $data)
                                                <option value="{{ $data->id_agama }}">{{ $data->agama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Dalam Keluarga</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_status_dalamkeluarga" name="id_status_dalamkeluarga">
                                            <option>Pilih Status Dalam Keluarga...</option>
                                            @foreach ($status_dalamkeluarga as $data)
                                                <option value="{{ $data->id_status_dalamkeluarga }}">{{ $data->status_dalamkeluarga }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status JAMKESDA</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="status_jamkesda" name="status_jamkesda"
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
    @include('dashboard.path.jquery')

    <script>
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('keluarga.index') }}",
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
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'status_kawin',
                        name: 'id_status_kawin'
                    },
                    {
                        data: 'agama',
                        name: 'id_agama'
                    },
                    {
                        data: 'status_dalamkeluarga',
                        name: 'id_status_dalamkeluarga'
                    },
                    {
                        data: 'status_jamkesda',
                        name: 'status_jamkesda'
                    },
                    {
                        data: function(data) {
                            if (data.defunct_ind == "Y") {
                                return '<i class="mdi mdi-check"></i>';
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
                $('#id_jenis').val('');
                $('#formData').trigger("reset");
                $('#modelHeading').html("Create New Data Keluarga");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_keluarga = $("#id_keluarga").val();
                var nik = $("#nik").val();
                var no_kk = $("#no_kk").val();
                var nama = $("#nama").val();
                var jenis_kelamin = $("#jenis_kelamin").val();
                var tempat_lahir = $("#tempat_lahir").val();
                var tanggal_lahir = $("#tanggal_lahir").val();
                var id_status_kawin = $("#id_status_kawin").val();
                var id_agama = $("#id_agama").val();
                var id_status_dalamkeluarga = $("#id_status_dalamkeluarga").val();
                var status_jamkesda = $("#status_jamkesda").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('keluarga.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_keluarga: id_keluarga,
                        nik: nik,
                        no_kk: no_kk,
                        nama: nama,
                        jenis_kelamin: jenis_kelamin,
                        tempat_lahir: tempat_lahir,
                        tanggal_lahir: tanggal_lahir,
                        id_status_kawin: id_status_kawin,
                        id_agama: id_agama,
                        id_status_dalamkeluarga: id_status_dalamkeluarga,
                        status_jamkesda: status_jamkesda,
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
                var id_keluarga = $(this).data('id_keluarga');
                $.ajax({
                    type: "POST",
                    url: "{{ route('keluarga.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_keluarga: id_keluarga
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_keluarga').val(data.id_keluarga);
                        $('#nik').val(data.nik);
                        $('#no_kk').val(data.no_kk);
                        $('#nama').val(data.nama);
                        $('#jenis_kelamin').val(data.jenis_kelamin);
                        $('#tempat_lahir').val(data.tempat_lahir);
                        $('#tanggal_lahir').val(data.tanggal_lahir);
                        $('#id_status_kawin').val(data.id_status_kawin);
                        $('#id_agama').val(data.id_agama);
                        $('#id_status_dalamkeluarga').val(data.id_status_dalamkeluarga);
                        $('#status_jamkesda').val(data.status_jamkesda);
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
