{{-- Apotik Page Start --}}

<div class="modal fade" id="apotikTable" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="modelHeading">Data Apotik</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border" id="tableApotik">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Apotik</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Bidang Usaha</th>
                            <th class="text-center">Apoteker</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->name_apotik }}</td>
                                <td class="text-center">{{ $data->alamat_apotik }}</td>
                                <td class="text-center">{{ $data->bidang_usaha }}</td>
                                <td class="text-center">{{ $data->apoteker }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableApotik').DataTable();
    });
</script>


{{-- Apotik Page End --}}
