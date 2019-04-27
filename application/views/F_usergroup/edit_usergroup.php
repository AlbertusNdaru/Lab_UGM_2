
<div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Edit usergroup</a>
            </li>
        </ul>
    </div>
    
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit</h2>
            </div>
            <div class="box-content">
                <form name="fromeditusergroup" action="<?= base_url('M_usergroup/M_usergroup/editusergroup')?>"  method="post">
                        <div class="form-group">
                            <label>Hak Akses</label>
                            <input required type="Text" name="hakakses" class="form-control"  value=<?= $editusergroup->Description?>>
                        </div>
                    <button type="submit" name="submitid" value=<?= $editusergroup->Id?> class="btn btn-default">Update</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->