<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Karyawan extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_karyawan');
    }

    function get_karyawan()
    {
        $data['karyawan'] = $this->Model_karyawan->get_karyawan();
        $this->template->load('Template/Template_admin','F_karyawan/view_karyawan',$data);
    }

    function viewFormEditKaryawan()
    {
        $id = $this->input->get('id');
        $data['editKaryawan'] = $this->Model_karyawan->get_karyawan_by_id($id);
        $this->template->load('Template/Template_admin','F_karyawan/edit_karyawan',$data);;
    }

    function addKaryawan()
    {
        $karyawan = array(
                        'Name'=>$this->input->post('name'),
                        'Gender'=>$this->input->post('gender'),
                        'Address'=>$this->input->post('address'),
                        'Phone'=>$this->input->post('phone')
                        );
        $addkaryawan= $this->Model_karyawan->add_karyawan($karyawan);
        if($addkaryawan)
        {   
            $this->session->set_flashdata('Status','Input Succes');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
    }

    function editKaryawan()
    {
        $id = $this->input->post('submitid');
        $karyawan = array(
                        'Name'=>$this->input->post('name'),
                        'Gender'=>$this->input->post('gender'),
                        'Address'=>$this->input->post('address'),
                        'Phone'=>$this->input->post('phone')
                        );
        $editkaryawan= $this->Model_karyawan->update_karyawan($id,$karyawan);
        if($editkaryawan)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
    }

    function editStatusKaryawan()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $karyawan = array(
                        'Status'=>$status
                        );
        $editkaryawan= $this->Model_karyawan->update_karyawan($id,$karyawan);
        if($editkaryawan)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
    }

    function deleteKaryawan()
    {
        $id=$this->input->get('id');
        $deleteKaryawan = $this->Model_karyawan->delete_karyawan($id);
        if($deleteKaryawan)
        {   
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('M_karyawan/M_karyawan/get_karyawan');
        }
        
    }
}
?>