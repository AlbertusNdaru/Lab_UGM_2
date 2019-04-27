
<div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Edit mahasiswa</a>
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
                <form name="fromeditmahasiswa" action="<?= base_url('M_mahasiswa/M_mahasiswa/editmahasiswa')?>"  method="post">
                    <div class="form-group">
                        <label>NIM</label>
                        <input required type="Text" name="nim" class="form-control" value=<?= $editmahasiswa->NIM?>>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input required type="Text" name="name" class="form-control" value=<?= $editmahasiswa->Name?>>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input required type="Text" name="address" class="form-control" value=<?= $editmahasiswa->Address?> >
                    </div>
                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input required type="Text" name="phone" class="form-control" value=<?= $editmahasiswa->Phone?>>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control selectpicker">
                            <option>Choose Gender</option>
                            <option value="L" <?php if ($editmahasiswa->Gender == "L") {echo 'selected';}?>>Laki-Laki</option>
                            <option value="P" <?php if ($editmahasiswa->Gender == "P") {echo 'selected';}?>>Perempuan</option>
                        </select>    
                    </div>
                    <button type="submit" name="submitid" value=<?= $editmahasiswa->Id?> class="btn btn-default">Update</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->