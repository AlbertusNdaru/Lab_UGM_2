<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_admin');
        
    }

    function index()
    {
        if(isset($_SESSION['Admin']))
		{
			redirect('M_admin/Dashboard');
		}
		else
		{
        $this->load->view('F_admin/login1');
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
            redirect('M_admin/Dashboard');
        }
        else
        {
            $this->session->set_flashdata('Error','Username and Password Incorect'); 
            redirect('M_admin/Login');
        }
    }

    function logout()
    {
        session_destroy();
        redirect('Welcome');
    }
}
?>