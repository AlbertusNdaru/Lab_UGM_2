
<div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Edit Karyawan</a>
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
                <form name="fromeditkaryawan" action="<?= base_url('M_karyawan/M_karyawan/editKaryawan')?>"  method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input required type="Text" name="name" class="form-control" value=<?= $editKaryawan->Name?>>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input required type="Text" name="address" class="form-control" value=<?= $editKaryawan->Address?> >
                    </div>
                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input required type="Text" name="phone" class="form-control" value=<?= $editKaryawan->Phone?>>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control selectpicker">
                            <option>Choose Gender</option>
                            <option value="L" <?php if ($editKaryawan->Gender == "L") {echo 'selected';}?>>Laki-Laki</option>
                            <option value="P" <?php if ($editKaryawan->Gender == "P") {echo 'selected';}?>>Perempuan</option>
                        </select>    
                    </div>
                    <button type="submit" name="submitid" value=<?= $editKaryawan->Id?> class="btn btn-default">Update</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->