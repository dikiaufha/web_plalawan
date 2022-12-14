<table class="table table-hover data-table" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Role</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->role }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    <button class="btn btn-warning" onClick="show({{ $data->id }})">Edit</button>
                    <button class="btn btn-danger" onClick="destroy({{ $data->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>

