    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Data User Mahasiswa</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Data User Mahasiswa</h2>

        <div class="box-icon">
            <a href="#" class="btn addKaryawan btn-round btn-default"><i class="glyphicon glyphicon-plus-sign"></i></a>
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
                    <th>Username</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user_mahasiswa as $k) { ?>
                    <tr>
                        <td><?= $k->Username?></td>
                        <td><?= $k->NIM?></td>
                        <td><?= $k->Name?></td>
                        <td class="center">
                            <span class="label-success label <?php if($k->Status=='Aprove') echo 'label-default'; else echo 'label-danger';?>"><?= $k->Status?></span>
                        </td>
                        <td class="center">
                        <?php if ($_SESSION['Admin']->Usergroup_id == 1) {?>
                            <?php if ($k->Status == "Rejected") {?>
                                <a class="btn btn-success" style="width: 94px;" href="<?= base_url('M_user_mahasiswa/M_user_mahasiswa/editStatususermahasiswa?id='.$k->Id.'&status=1')?>">
                                    <i class="glyphicon glyphicon-ok icon-white"></i>
                                    Aprrove
                            <?php } else {?>
                                <a class="btn btn-danger" style="width: 94px;" href="<?= base_url('M_user_mahasiswa/M_user_mahasiswa/editStatususermahasiswa?id='.$k->Id.'&status=0')?>">
                                        <i class="glyphicon glyphicon-remove icon-white"></i>
                                    Reject
                            <?php }?>
                                </a>
                        <?php }?>
                            <a class="btn btn-info" href="<?= base_url('M_user_mahasiswa/M_user_mahasiswa/viewFormEditusermahasiswa?id='.$k->Id.'')?>">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="<?= base_url('M_user_mahasiswa/M_user_mahasiswa/deleteusermahasiswa?id='.$k->Id.'')?>">
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

    <?php include "add_user_mahasiswa.php";?>

<script>
    $('.addKaryawan').click(function (e) {
        e.preventDefault();
        $('#addkaryawan').modal('show');
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