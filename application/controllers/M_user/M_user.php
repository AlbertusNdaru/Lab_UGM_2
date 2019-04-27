<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_karyawan');
        $this->load->model('Model_usergroup');
    }

    function get_user()
    {
        $data['user'] = $this->Model_user->get_user();
        $data['karyawan'] = $this->Model_karyawan->get_karyawan_by_status();
        $data['usergroup']= $this->Model_usergroup->get_usergroup();
        $this->template->load('Template/Template_admin','F_user/view_user',$data);
    }

    function viewFormEdituser()
    {
        $id = $this->input->get('id');
        $data['edituser'] = $this->Model_user->get_user_by_id($id);
        $data['usergroup']= $this->Model_usergroup->get_usergroup();
        $this->template->load('Template/Template_admin','F_user/edit_user',$data);;
    }

    function adduser()
    {
        $user = array(  
                        'Username'=>$this->input->post('username'),
                        'Karyawan_id'=>$this->input->post('karyawanid'),
                        'Usergroup_id'=>$this->input->post('usergroupid')                        
                    );
        $adduser= $this->Model_user->add_user($user);
        if($adduser)
        {   
            $this->session->set_flashdata('Status','Input Succes');
            redirect('M_user/M_user/get_user');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('M_user/M_user/get_user');
        }
    }

    function edituser()
    {
        $id = $this->input->post('submitid');
        $user = array(  
                        'Username'=>$this->input->post('username'),
                        'Password'=>$this->input->post('password'),
                        'Usergroup_id'=>$this->input->post('usergroupid'),
                        'Update_at'=>get_current_date()     
                     );               
        $edituser= $this->Model_user->update_user($id,$user);
        if($edituser)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_user/M_user/get_user');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_user/M_user/get_user');
        }
    }

    function editStatususer()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $user = array(
                        'Status'=>$status
                        );
        $edituser= $this->Model_user->update_user($id,$user);
        if($edituser)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_user/M_user/get_user');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_user/M_user/get_user');
        }
    }

    function deleteuser()
    {
        $id=$this->input->get('id');
        $deleteuser = $this->Model_user->delete_user($id);
        if($deleteuser)
        {   
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('M_user/M_user/get_user');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('M_user/M_user/get_user');
        }
        
    }
}
?>