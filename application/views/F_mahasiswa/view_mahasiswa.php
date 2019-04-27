    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Data mahasiswa</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Data mahasiswa</h2>

        <div class="box-icon">
            <a href="#" class="btn addmahasiswa btn-round btn-default"><i class="glyphicon glyphicon-plus-sign"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <!-- <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $k) { ?>
                    <tr>
                        <td><?= $k->NIM?></td>
                        <td><?= $k->Name?></td>
                        <td><?= $k->Gender?></td>
                        <td><?= $k->Address?></td>
                        <td><?= $k->Phone?></td>
                        <td class="center">
                            <span class="label-success label <?php if($k->Status=='Aktif') echo 'label-default'; else echo 'label-danger';?>"><?= $k->Status?></span>
                        </td>
                        <td class="center">
                        <?php if ($_SESSION['Admin']->Usergroup_id == 1) {?>
                            <?php if ($k->Status == "Off") {?>
                                <a class="btn btn-success" style="width: 94px;" href="<?= base_url('M_mahasiswa/M_mahasiswa/editStatusmahasiswa?id='.$k->Id.'&status=Aktif')?>">
                                    <i class="glyphicon glyphicon-ok icon-white"></i>
                                    Aktif
                            <?php } else {?>
                                <a class="btn btn-danger" style="width: 94px;" href="<?= base_url('M_mahasiswa/M_mahasiswa/editStatusmahasiswa?id='.$k->Id.'&status=Off')?>">
                                        <i class="glyphicon glyphicon-remove icon-white"></i>
                                    Off
                            <?php }?>
                                </a>
                        <?php }?>
                            <a class="btn btn-info" href="<?= base_url('M_mahasiswa/M_mahasiswa/viewFormEditmahasiswa?id='.$k->Id.'')?>">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="<?= base_url('M_mahasiswa/M_mahasiswa/deletemahasiswa?id='.$k->Id.'')?>">
                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        </div>
        </div>
        <!--/span-->
        </div><!--/row-->
    </div><!--/span-->

    <?php include "add_mahasiswa.php";?>

<script>
    $('.addmahasiswa').click(function (e) {
        e.preventDefault();
        $('#addmahasiswa').modal('show');
    });

<?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
<?php }?>


 function setnotifstatus(err)
{ 
if (err == 'Input Succes' || err == 'Edit Succes' || err == 'Delete Succes')
    {
      ttp='success';
    }
 else
    {
    ttp='danger';
    }

  $.notify({
	// options
	message: err,
  },{
    // settings
    element: 'body',
    position: null,
    type: ttp,
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
      from: "top",
      align: "center"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    timer: 500,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated bounceIn',
		exit: 'animated bounceOut'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="title">{1}</span> ' +
      '<span data-notify="message">{2}</span>' +
      '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
      '</div>' +
      '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>' 
  });

}
</script>