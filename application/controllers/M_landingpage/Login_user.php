<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_user extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_user_mahasiswa');
        
    }

    function index()
    {
        if(isset($_SESSION['User']))
		{
			//redirect('M_admin/Dashboard');
		}
		else
		{
        $this->load->view('F_landingpage/login_mahasiswa');
        }
    }

    function login()
    {
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $getAdmin = $this->Model_admin->get_admin_by_user_password($username,$password);
        if($getAdmin && $getAdmin->Status== "Aprove")
        {   
            //$this->load->view('Template/Template_admin');
            $this->session->set_userdata('Admin',$getAdmin);
            //$this->template->load('Template/Template_admin','F_admin/dashboard',$data);
        }
        else
        {
            $this->session->set_flashdata('Error','Username and Password Incorect'); 
            $this->template->load('Template/Template_admin','F_admin/dashboard',$data);
        }
    }

    function logout()
    {
        session_destroy();
        redirect('Welcome');
    }
}
?>