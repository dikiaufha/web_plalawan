@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kondisi Aset Pertahun Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Data Master</a></li>
                        <li class="breadcrumb-item active">Kondisi Aset Pertahun</li>
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
                                        <th>Tahun</th>
                                        <th>Baik</th>
                                        <th>Rusak Ringan</th>
                                        <th>Rusak Berat</th>
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
                        <input type="hidden" name="id_kondisiaset_pertahun" id="id_kondisiaset_pertahun">
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
                                    <label class="col-sm-3 col-form-label">Baik</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="baik" id="baik"
                                                    value="1"> Ya </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="baik" id="baik"
                                                    value="0"> Tidak </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rusak Ringan</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="rusak_ringan"
                                                    id="rusak_ringan" value="1"> Ya </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="rusak_ringan"
                                                    id="rusak_ringan" value="0"> Tidak </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rusak Berat</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="rusak_berat"
                                                    id="rusak_berat" value="1"> Ya </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="rusak_berat"
                                                    id="rusak_berat" value="0"> Tidak </label>
                                        </div>
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
                ajax: "{{ route('kondisiaset-pertahun.index') }}",
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
                        data: function(data) {
                            if (data.baik == 1) {
                                return '<i class="bi bi-check-lg"></i>';
                            }
                            return '-';
                        },
                        name: 'baik'
                    },
                    {
                        data: function(data) {
                            if (data.rusak_ringan == 1) {
                                return '<i class="bi bi-check-lg"></i>';
                            }
                            return '-';
                        },
                        name: 'rusak_ringan'
                    },
                    {
                        data: function(data) {
                            if (data.rusak_berat == 1) {
                                return '<i class="bi bi-check-lg"></i>';
                            }
                            return '-';
                        },
                        name: 'rusak_berat'
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
                $('#modelHeading').html("Create New Data Kondisi Aset Pertahun");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_kondisiaset_pertahun = $("#id_kondisiaset_pertahun").val();
                var id_tahun = $("#id_tahun").val();
                var baik = $("#baik:checked").val();
                var rusak_ringan = $("#rusak_ringan:checked").val();
                var rusak_berat = $("#rusak_berat:checked").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('kondisiaset-pertahun.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kondisiaset_pertahun: id_kondisiaset_pertahun,
                        id_tahun: id_tahun,
                        baik: baik,
                        rusak_ringan: rusak_ringan,
                        rusak_berat: rusak_berat,
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
                var id_kondisiaset_pertahun = $(this).data('id_kondisiaset_pertahun');
                $.ajax({
                    type: "POST",
                    url: "{{ route('kondisiaset-pertahun.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_kondisiaset_pertahun: id_kondisiaset_pertahun
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Kondisi Aset Pertahun");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_kondisiaset_pertahun').val(data.id_kondisiaset_pertahun);
                        $('#id_tahun').val(data.id_tahun);
                        $('input:radio[name=baik][value=' + data.baik + ']')[0].checked = true;
                        $('input:radio[name=rusak_ringan][value=' + data.rusak_ringan + ']')[0]
                            .checked = true;
                        $('input:radio[name=rusak_berat][value=' + data.rusak_berat + ']')[0]
                            .checked = true;
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
