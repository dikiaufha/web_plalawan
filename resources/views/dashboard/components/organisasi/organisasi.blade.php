@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Organisasi Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/dashboard">Data Jenis Organisasi</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Organisasi</li>
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
                                <th>Nama Organisasi</th>
                                <th>Jenis Organisasi</th>
                                <th>Kelompok</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
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
                        <input type="hidden" name="id_organisasi" id="id_organisasi">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Organisasi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name_organisasi" name="name_organisasi"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Organisasi</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_jenis" name="id_jenis">
                                            <option>Pilih Jenis Organisasi...</option>
                                            @foreach ($jenisorg as $data)
                                                <option value="{{ $data->id_jenis }}">{{ $data->nama_organisasi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kelompok</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="kelompok" name="kelompok">
                                            <option>Pilih Kelompok...</option>
                                            <option value="faskes">Faskes</option>
                                            <option value="nonfaskes">Non Faskes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Desa</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_desa" name="id_desa">
                                            <option>Pilih Nama Desa...</option>
                                            @foreach ($desa as $data)
                                                <option value="{{ $data->id_desa }}">{{ $data->nama_desa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_kec" name="id_kec">
                                            <option>Pilih Nama Kecamatan...</option>
                                            @foreach ($kecamatan as $data)
                                                <option value="{{ $data->id_kec }}">{{ $data->nama_kecamatan }}</option>
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
                ajax: "{{ route('organisasi.index') }}",
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
                        name: 'name_organisasi'
                    },
                    {
                        data: 'nama_organisasi',
                        name: 'id_jenis'
                    },
                    {
                        data: 'kelompok',
                        name: 'kelompok'
                    },
                    {
                        data: 'nama_desa',
                        name: 'id_desa'
                    },
                    {
                        data: 'nama_kecamatan',
                        name: 'id_kec'
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
                $('#modelHeading').html("Create New Data Organisasi");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_organisasi = $("#id_organisasi").val();
                var name_organisasi = $("#name_organisasi").val();
                var id_jenis = $("#id_jenis").val();
                var kelompok = $("#kelompok").val();
                var id_desa = $("#id_desa").val();
                var id_kec = $("#id_kec").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('organisasi.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_organisasi: id_organisasi,
                        name_organisasi: name_organisasi,
                        id_jenis: id_jenis,
                        kelompok: kelompok,
                        id_desa: id_desa,
                        id_kec: id_kec,
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
                var id_organisasi = $(this).data('id_organisasi');
                $.ajax({
                    type: "POST",
                    url: "{{ route('organisasi.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_organisasi: id_organisasi
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_organisasi').val(data.id_organisasi);
                        $('#name_organisasi').val(data.name_organisasi);
                        $('#id_jenis').val(data.id_jenis);
                        $('#kelompok').val(data.kelompok);
                        $('#id_desa').val(data.id_desa);
                        $('#id_kec').val(data.id_kec);
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
