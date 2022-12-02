@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Sepuluh Penyakit Menonjol Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/dashboard">Data Jenis Organisasi</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Sepuluh Penyakit Menonjol</li>
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
                                <th>Tahun</th>
                                <th>Penyakit</th>
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
                        <input type="hidden" name="id_penyakit_menonjol" id="id_penyakit_menonjol">
                        @csrf
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
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Penyakit</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_penyakit" name="id_penyakit">
                                            <option>Pilih Penyakit...</option>
                                            @foreach ($penyakit as $data)
                                                <option value="{{ $data->id_penyakit }}">{{ $data->nama_penyakit }}</option>
                                            @endforeach
                                        </select>
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
                ajax: "{{ route('penyakit-menonjol.index') }}",
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
                        data: 'tahun',
                        name: 'id_tahun'
                    },
                    {
                        data: 'nama_penyakit',
                        name: 'id_penyakit'
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
                $('#modelHeading').html("Create New Data Penyakit Menonjol");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_penyakit_menonjol = $("#id_penyakit_menonjol").val();
                var id_tahun = $("#id_tahun").val();
                var id_penyakit = $("#id_penyakit").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('penyakit-menonjol.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_penyakit_menonjol: id_penyakit_menonjol,
                        id_tahun: id_tahun,
                        id_penyakit: id_penyakit,
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
                var id_penyakit_menonjol = $(this).data('id_penyakit_menonjol');
                $.ajax({
                    type: "POST",
                    url: "{{ route('penyakit-menonjol.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_penyakit_menonjol: id_penyakit_menonjol
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_penyakit_menonjol').val(data.id_penyakit_menonjol);
                        $('#id_tahun').val(data.id_tahun);
                        $('#id_penyakit').val(data.id_penyakit);
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
