<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_usergroup extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_usergroup');
    }

    function get_usergroup()
    {
        $data['usergroup'] = $this->Model_usergroup->get_usergroup();
        $this->template->load('Template/Template_admin','F_usergroup/view_usergroup',$data);
    }

    function viewFormEditusergroup()
    {
        $id = $this->input->get('id');
        $data['editusergroup'] = $this->Model_usergroup->get_usergroup_by_id($id);
        $this->template->load('Template/Template_admin','F_usergroup/edit_usergroup',$data);;
    }

    function addusergroup()
    {
        $usergroup = array(
                        'Description'=>$this->input->post('hakakses'),
                        );
        $addusergroup= $this->Model_usergroup->add_usergroup($usergroup);
        if($addusergroup)
        {   
            $this->session->set_flashdata('Status','Input Succes');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
    }

    function editusergroup()
    {
        $id = $this->input->post('submitid');
        $usergroup = array(
                        'Description'=>$this->input->post('hakakses'),
                        'Update_at'=>get_current_date()    
                        );
        $editusergroup= $this->Model_usergroup->update_usergroup($id,$usergroup);
        if($editusergroup)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
    }

    function deleteusergroup()
    {
        $id=$this->input->get('id');
        $deleteusergroup = $this->Model_usergroup->delete_usergroup($id);
        if($deleteusergroup)
        {   
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('M_usergroup/M_usergroup/get_usergroup');
        }
        
    }
}
?>