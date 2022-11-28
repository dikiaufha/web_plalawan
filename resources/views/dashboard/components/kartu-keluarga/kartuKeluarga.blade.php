@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Kartu Keluarga Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/dashboard">Data Jenis Organisasi</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Kartu Keluarga</li>
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
                                <th>No KK</th>
                                <th>Alamat KK</th>
                                <th>RT KK</th>
                                <th>RW KK</th>
                                <th>Kodepos KK</th>
                                <th>Desa</th>
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
                        <input type="hidden" name="id_kartu_keluarga" id="id_kartu_keluarga">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No KK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="no_kk" name="no_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat KK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat_kk" name="alamat_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RT KK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="rt_kk" name="rt_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RW KK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="rw_kk" name="rw_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">KodePos KK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="kodepos_kk" name="kodepos_kk"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Desa</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="id_desa" name="id_desa">
                                            <option>Pilih Desa...</option>
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
                ajax: "{{ route('kartu-keluarga.index') }}",
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
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'alamat_kk',
                        name: 'alamat_kk'
                    },
                    {
                        data: 'rt_kk',
                        name: 'rt_kk'
                    },
                    {
                        data: 'rw_kk',
                        name: 'rw_kk'
                    },
                    {
                        data: 'kodepos_kk',
                        name: 'kodepos_kk'
                    },
                    {
                        data: 'nama_desa',
                        name: 'id_desa'
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
                $('#modelHeading').html("Create New Data Kartu Keluarga");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_kartu_keluarga = $("#id_kartu_keluarga").val();
                var no_kk = $("#no_kk").val();
                var alamat_kk = $("#alamat_kk").val();
                var rt_kk = $("#rt_kk").val();
                var rw_kk = $("#rw_kk").val();
                var kodepos_kk = $("#kodepos_kk").val();
                var id_desa = $("#id_desa").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('kartu-keluarga.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kartu_keluarga: id_kartu_keluarga,
                        no_kk: no_kk,
                        alamat_kk: alamat_kk,
                        rt_kk: rt_kk,
                        rw_kk: rw_kk,
                        kodepos_kk: kodepos_kk,
                        id_desa: id_desa,
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
                var id_kartu_keluarga = $(this).data('id_kartu_keluarga');
                $.ajax({
                    type: "POST",
                    url: "{{ route('kartu-keluarga.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kartu_keluarga: id_kartu_keluarga
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_kartu_keluarga').val(data.id_kartu_keluarga);
                        $('#no_kk').val(data.no_kk);
                        $('#alamat_kk').val(data.alamat_kk);
                        $('#rt_kk').val(data.rt_kk);
                        $('#rw_kk').val(data.rw_kk);
                        $('#kodepos_kk').val(data.kodepos_kk);
                        $('#id_desa').val(data.id_desa);
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
