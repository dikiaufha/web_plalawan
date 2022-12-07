{{-- Faskes Page Start --}}

<div class="modal fade" id="faskesTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Faskes</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableApotik">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Tempat Usaha</th>
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
        $('#tableApotik').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true
        });
    });
</script>


{{-- Faskes Page End --}}


{{-- Nakes Page Start --}}

<div class="modal fade" id="nakesTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Nakes</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableNakes">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Konsentrasi Nakes</th>
                            <th class="text-center">Spesialis Nakes</th>
                            <th class="text-center">Organisasi Nakes</th>
                        </tr>
                    </thead>
                    @foreach ($nakes as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->nama_nakes }}</td>
                                <td class="text-center">{{ $data->nama_konsentrasi }}</td>
                                <td class="text-center">{{ $data->nama_spesialis }}</td>
                                <td class="text-center">{{ $data->name_organisasi }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableNakes').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Nakes Page End --}}

{{-- Organisasi Page Start --}}

<div class="modal fade" id="organisasiTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Organisasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableOrganisasi">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Organisasi</th>
                            <th class="text-center">Jenis Organisasi</th>
                            <th class="text-center">Kelompok</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Kecamatan</th>
                        </tr>
                    </thead>
                    @foreach ($organisasi as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->name_organisasi }}</td>
                                <td class="text-center">{{ $data->nama_organisasi }}</td>
                                <td class="text-center">
                                    @if( $data->kelompok  == "faskes")
                                        Faskes
                                    @elseif ( $data->kelompok == "nonfaskes")
                                        Non Faskes
                                    @endif
                                </td>
                                <td class="text-center">{{ $data->nama_desa }}</td>
                                <td class="text-center">{{ $data->nama_kecamatan }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableOrganisasi').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Organisasi Page End --}}
