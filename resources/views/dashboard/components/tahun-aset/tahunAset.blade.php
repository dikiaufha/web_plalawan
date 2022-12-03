@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tahun Aset Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Data Master</a></li>
                        <li class="breadcrumb-item active">Tahun Aset</li>
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
                        <button class="btn btn-success mb-5" id="addBtn" data-bs-toggle="modal"
                            data-bs-target="#formModal">Tambah
                            Data <i class="bi bi-plus-lg"></i></button>
                        <div class="table-responsive">
                            <table class="table table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Organisasi</th>
                                        <th>Jenis Aset</th>
                                        <th>Tahun</th>
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
                    <form id="formData" name="formData">
                        <input type="hidden" name="id_tahun_aset" id="id_tahun_aset">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Organisasi</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_organisasi" name="id_organisasi">
                                            <option>Pilih Organisasi...</option>
                                            @foreach ($organisasi as $data)
                                                <option value="{{ $data->id_organisasi }}">{{ $data->name_organisasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Aset</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_jenis_aset" name="id_jenis_aset">
                                            <option>Pilih Jenis Aset...</option>
                                            @foreach ($jenisAset as $data)
                                                <option value="{{ $data->id_jenis_aset }}">{{ $data->nama_aset }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_tahun" name="id_tahun">
                                            <option>Pilih Tahun...</option>
                                            @foreach ($tahun as $data)
                                                <option value="{{ $data->id_tahun }}">{{ $data->tahun }}</option>
                                            @endforeach
                                        </select>
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
    @include('dashboard.path.jquery')

    <script>
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tahun-aset.index') }}",
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
                        data: 'name_organisasi',
                        name: 'id_organisasi'
                    },
                    {
                        data: 'nama_aset',
                        name: 'id_jenis_aset'
                    },
                    {
                        data: 'tahun',
                        name: 'id_tahun'
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
                $('#id_jenis').val('');
                $('#formData').trigger("reset");
                $('#modelHeading').html("Create New Data Tahun Aset");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_tahun_aset = $("#id_tahun_aset").val();
                var id_organisasi = $("#id_organisasi").val();
                var id_jenis_aset = $("#id_jenis_aset").val();
                var id_tahun = $("#id_tahun").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('tahun-aset.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_tahun_aset: id_tahun_aset,
                        id_organisasi: id_organisasi,
                        id_jenis_aset: id_jenis_aset,
                        id_tahun: id_tahun,
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
                var id_tahun_aset = $(this).data('id_tahun_aset');
                $.ajax({
                    type: "POST",
                    url: "{{ route('tahun-aset.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_tahun_aset: id_tahun_aset
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Tahun Aset");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_tahun_aset').val(data.id_tahun_aset);
                        $('#id_organisasi').val(data.id_organisasi);
                        $('#id_jenis_aset').val(data.id_jenis_aset);
                        $('#id_tahun').val(data.id_tahun);
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
