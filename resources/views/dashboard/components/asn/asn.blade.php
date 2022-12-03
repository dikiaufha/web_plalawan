@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ASN Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Data Master</a></li>
                        <li class="breadcrumb-item active">ASN</li>
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
                        <div class="">
                            <table class="table table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Organisasi</th>
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
                        <input type="hidden" name="id_asn" id="id_asn">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nip" name="nip" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pendidikan_terakhir"
                                            name="pendidikan_terakhir" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bidang Ilmu</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_bidang_ilmu" name="id_bidang_ilmu">
                                            <option>Pilih Bidang Ilmu...</option>
                                            @foreach ($bidangIlmu as $data)
                                                <option value="{{ $data->id_bidang_ilmu }}">{{ $data->bidang_ilmu }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Organisasi</label>
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
                ajax: "{{ route('asn.index') }}",
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
                        data: 'nip',
                        name: 'nip'
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
                        data: 'pendidikan_terakhir',
                        name: 'pendidikan_terakhir'
                    },
                    {
                        data: 'bidang_ilmu',
                        name: 'id_bidang_ilmu'
                    },
                    {
                        data: 'name_organisasi',
                        name: 'id_organisasi'
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
                $('#modelHeading').html("Create New Data ASN");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_asn = $("#id_asn").val();
                var nip = $("#nip").val();
                var nama = $("#nama").val();
                var jenis_kelamin = $("#jenis_kelamin").val();
                var tempat_lahir = $("#tempat_lahir").val();
                var tanggal_lahir = $("#tanggal_lahir").val();
                var pendidikan_terakhir = $("#pendidikan_terakhir").val();
                var id_bidang_ilmu = $("#id_bidang_ilmu").val();
                var id_organisasi = $("#id_organisasi").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('asn.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_asn: id_asn,
                        nip: nip,
                        nama: nama,
                        jenis_kelamin: jenis_kelamin,
                        tempat_lahir: tempat_lahir,
                        tanggal_lahir: tanggal_lahir,
                        pendidikan_terakhir: pendidikan_terakhir,
                        id_bidang_ilmu: id_bidang_ilmu,
                        id_organisasi: id_organisasi,
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
                var id_asn = $(this).data('id_asn');
                $.ajax({
                    type: "POST",
                    url: "{{ route('asn.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_asn: id_asn
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Data ASN");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_asn').val(data.id_asn);
                        $('#nip').val(data.nip);
                        $('#nama').val(data.nama);
                        $('#jenis_kelamin').val(data.jenis_kelamin);
                        $('#tempat_lahir').val(data.tempat_lahir);
                        $('#tanggal_lahir').val(data.tanggal_lahir);
                        $('#pendidikan_terakhir').val(data.pendidikan_terakhir);
                        $('#id_bidang_ilmu').val(data.id_bidang_ilmu);
                        $('#id_organisasi').val(data.id_organisasi);
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
