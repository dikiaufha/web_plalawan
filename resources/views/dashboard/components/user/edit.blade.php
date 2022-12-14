<div class="p2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" required
                        value="{{ $data->nama }}" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-control" id="role" name="role">
                        <option>Pilih Role...</option>
                        @if ($data->role)
                            <option value="admin" selected>Admin</option>
                        @else
                            <option value="user" selected>User</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $data->email }}"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row col">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="input-group col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}" disabled>
                    <span class="input-group-text bi bi-eye" onclick="showPassword();"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal" >Close</button>
  <button type="submit" class="btn btn-primary" id="saveBtn" onClick="update({{ $data->id }})">Save Data</button>
</div>
