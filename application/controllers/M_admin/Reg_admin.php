<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reg_admin extends CI_Controller{
    /**
     * Class constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_admin');
        $this->load->model('Model_karyawan');
        $this->load->model('Model_user_group');
    }

    function index()
    {
        $dataRegistrasi['usergroup']=$this->Model_user_group->get_user_group();
        $dataRegistrasi['karyawan']=$this->Model_karyawan->get_karyawan();
        $this->load->view('admin/register_admin',$dataRegistrasi);
    }

    function add_admin()
    {
        $username     = $this->input->post('username');
        $password     = $this->input->post('password');
        $usergroup_id = $this->input->post('usergroup_id');
        $karyawan_id  = $this->input->post('karyawan_id');
        $dataAdmin = array('Username'=>$username,
                           'Password'=>$password,
                           'Usergroup_id'=>$usergroup_id,
                           'Karyawan_id'=>$karyawan_id);
        $reg_admin = $this->Model_admin->add_admin($dataAdmin);
        if($reg_admin)
        {
            $this->load->view('admin/login');
        }
    }
}
?>