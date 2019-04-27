
<div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Edit user mahasiswa</a>
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
                <form name="fromedituser" action="<?= base_url('M_user/M_user/edituser')?>"  method="post">
                    <div class="form-group">
                        <label>Username Mahasiswa</label>
                        <input required type="Text" name="username" class="form-control" value=<?= $edituser->Username?>>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input required type="Text" name="password" class="form-control" value=<?= $edituser->Password?> >
                    </div>
                    <div class="form-group">
                        <label>Usergroup</label>
                        <select name="usergroupid" class="form-control">
                            <?php foreach ($usergroup as $k) {
                                    echo "<option value='$k->Id'";
                                    echo $edituser->Usergroup_id==$k->Id?'selected':'';
                                    echo">$k->Description</option>";
                                } ?>
                        </select>
                    </div>
                    <button type="submit" name="submitid" value=<?= $edituser->Id?> class="btn btn-default">Update</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->