@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span> Apotik Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Apotik</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-inverse-success mb-5" id="addBtn" data-bs-toggle="modal"
                        data-bs-target="#formModal">Tambah
                        Data <i class="mdi mdi-plus"></i></button>
                    <table class="table table-hover data-table" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Apotik</th>
                                <th>Alamat</th>
                                <th>Bidang Usaha</th>
                                <th>Apoteker</th>
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
                        <input type="hidden" name="apotik_id" id="apotik_id">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Apotik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name_apotik" name="name_apotik" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat Apotik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat_apotik" name="alamat_apotik"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bidang Usaha</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Apoteker</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="apoteker" name="apoteker"
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
                ajax: "{{ route('apotik.index') }}",
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
                        data: 'name_apotik',
                        name: 'name_apotik'
                    },
                    {
                        data: 'alamat_apotik',
                        name: 'alamat_apotik'
                    },
                    {
                        data: 'bidang_usaha',
                        name: 'bidang_usaha'
                    },
                    {
                        data: 'apoteker',
                        name: 'apoteker'
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
                $('#apotik_id').val('');
                $('#formData').trigger("reset");
                $('#modelHeading').html("Create New Data Apotik");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var apotik_id = $("#apotik_id").val();
                var name_apotik = $("#name_apotik").val();
                var alamat_apotik = $("#alamat_apotik").val();
                var bidang_usaha = $("#bidang_usaha").val();
                var apoteker = $("#apoteker").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('apotik.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: apotik_id,
                        name_apotik: name_apotik,
                        alamat_apotik: alamat_apotik,
                        bidang_usaha: bidang_usaha,
                        apoteker: apoteker,
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
                var apotik_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('apotik.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: apotik_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#apotik_id').val(data.id);
                        $('#name_apotik').val(data.name_apotik);
                        $('#alamat_apotik').val(data.alamat_apotik);
                        $('#bidang_usaha').val(data.bidang_usaha);
                        $('#apoteker').val(data.apoteker);
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
