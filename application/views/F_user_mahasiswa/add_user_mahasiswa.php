<div class="modal fade" id="addkaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Tambah Data User</h3>
            </div>
            <div class="modal-body">
            <!-- start body -->
                <div class="row">
                    <div class="box col-md-12">
                            <div class="box-content">
                                <form name="fromadduser" action="<?= base_url('M_user/M_user/adduser')?>"  method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required type="Text" name="username" class="form-control" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Karyawan</label>
                                        <select name="karyawanid" class="form-control selectpicker">
                                            <option>Karyawan</option>
                                            <?php foreach ($karyawan as $k) {
                                                echo "<option value='$k->Id'>$k->Name</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="usergroupid" class="form-control selectpicker">
                                            <option>Usergroup</option>
                                            <?php foreach ($usergroup as $k) {
                                                echo "<option value='$k->Id'>$k->Description</option>";
                                            } ?>
                                        </select>
                                    </div>
                            </div>
                    </div>
                    <!--/span-->
                </div><!--/row-->
              <!-- end body -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
</div>
