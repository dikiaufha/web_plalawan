@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-plus-box"></i>
            </span> Status Kawin Page
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/dashboard">Data Dasar</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Status Kawin</li>
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
                                <th>Status Kawin</th>
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
                        <input type="hidden" name="id_status_kawin" id="id_status_kawin">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Kawin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="status_kawin" name="status_kawin"
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
                ajax: "{{ route('status-kawin.index') }}",
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
                        data: 'status_kawin',
                        name: 'status_kawin'
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
                $('#modelHeading').html("Create New Data Status Kawin");
                $('#formModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var id_status_kawin = $("#id_status_kawin").val();
                var status_kawin = $("#status_kawin").val();
                var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
                $.ajax({
                    url: "{{ route('status-kawin.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_status_kawin: id_status_kawin,
                        status_kawin: status_kawin,
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
                var id_status_kawin = $(this).data('id_status_kawin');
                $.ajax({
                    type: "POST",
                    url: "{{ route('status-kawin.edit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_status_kawin: id_status_kawin
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-data");
                        $('#formModel').modal('show');
                        $('#id_status_kawin').val(data.id_status_kawin);
                        $('#status_kawin').val(data.status_kawin);
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