<div class="modal fade" id="addusergroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Tambah Data usergroup</h3>
            </div>
            <div class="modal-body">
            <!-- start body -->
                <div class="row">
                    <div class="box col-md-12">
                            <div class="box-content">
                                <form name="fromaddusergroup" action="<?= base_url('M_usergroup/M_usergroup/addusergroup')?>"  method="post">
                                    <div class="form-group">
                                        <label>Hak Akses</label>
                                        <input required type="Text" name="hakakses" class="form-control" placeholder="Enter Hak Akses">
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
