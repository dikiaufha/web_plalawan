<div class="p2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-control" id="role" name="role">
                        <option>Pilih Role...</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
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
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row col">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="input-group col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="input-group-text bi bi-eye" onclick="showPassword();"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal" >Close</button>
  <button type="submit" class="btn btn-primary" id="saveBtn" onClick="store()">Save Data</button>
</div>

