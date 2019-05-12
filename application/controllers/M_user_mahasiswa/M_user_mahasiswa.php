<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user_mahasiswa extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_user_mahasiswa');
        $this->load->model('Model_mahasiswa');
    }

    function get_user_mahasiswa()
    {
        $data['user_mahasiswa'] = $this->Model_user_mahasiswa ->get_user_mahasiswa();
        $this->template->load('Template/Template_admin','F_user_mahasiswa/view_user_mahasiswa',$data);
    }

    function viewFormEdituser_mahasiswa()
    {
        $id = $this->input->get('id');
        $data['edituser_mahasiswa '] = $this->Model_user_mahasiswa ->get_user_mahasiswa_by_id($id);
        $this->template->load('Template/Template_admin','F_user_mahasiswa/edit_user_mahasiswa',$data);;
    }

    function adduser_mahasiswa()
    {
        $user_mahasiswa  = array(  
                        'Username'=>$this->input->post('username'),
                        'Mahasiswa_id'=>$this->input->post('mahasiswa_id'),
                        'Password'=>$this->input->post('password')                 
                    );
        $adduser_mahasiswa = $this->Model_user_mahasiswa->add_user_mahasiswa($user_mahasiswa );
        if($adduser_mahasiswa)
        {   
            $this->session->set_flashdata('Status','Input Succes');
            redirect('M_landingpage/Login_user');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('M_landingpage/Login_user');
        }
    }

    function edituser_mahasiswa()
    {
        $id = $this->input->post('submitid');
        $user_mahasiswa  = array(  
                        'Username'=>$this->input->post('username'),
                        'Password'=>$this->input->post('password'),
                        'Update_at'=>get_current_date()     
                     );               
        $edituser_mahasiswa = $this->Model_user_mahasiswa ->update_user_mahasiswa($id,$user_mahasiswa );
        if($edituser_mahasiswa )
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa');
        }
    }

    function editStatususer_mahasiswa()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $user_mahasiswa  = array(
                        'Status'=>$status
                        );
        $edituser_mahasiswa = $this->Model_user_mahasiswa ->update_user_mahasiswa($id,$user_mahasiswa );
        if($edituser_mahasiswa )
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa');
        }
    }

    function deleteuser_mahasiswa()
    {
        $id=$this->input->get('id');
        $deleteuser_mahasiswa  = $this->Model_user_mahasiswa ->delete_user_mahasiswa($id);
        if($deleteuser_mahasiswa )
        {   
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa ');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('M_user_mahasiswa/M_user_mahasiswa/get_user_mahasiswa ');
        }
        
    }
}
?>