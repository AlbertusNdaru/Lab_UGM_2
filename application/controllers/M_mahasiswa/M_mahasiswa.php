<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_mahasiswa extends CI_Controller{

    /**
     * Class constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Model_mahasiswa');
    }

    function get_mahasiswa()
    {
        $data['mahasiswa'] = $this->Model_mahasiswa->get_mahasiswa();
        $this->template->load('Template/Template_admin','F_mahasiswa/view_mahasiswa',$data);
    }

    function viewFormEditmahasiswa()
    {
        $id = $this->input->get('id');
        $data['editmahasiswa'] = $this->Model_mahasiswa->get_mahasiswa_by_id($id);
        $this->template->load('Template/Template_admin','F_mahasiswa/edit_mahasiswa',$data);;
    }

    function addmahasiswa()
    {
        $mahasiswa = array(  
                        'NIM'=>$this->input->post('nim'),
                        'Name'=>$this->input->post('name'),
                        'Gender'=>$this->input->post('gender'),  
                        'Address'=>$this->input->post('address'),
                        'Phone'=>$this->input->post('phone'),                   
                    );
        $addmahasiswa= $this->Model_mahasiswa->add_mahasiswa($mahasiswa);
        if($addmahasiswa)
        {   
            $this->session->set_flashdata('Status','Input Succes');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
    }

    function editmahasiswa()
    {
        $id = $this->input->post('submitid');
        $mahasiswa = array(  
                            'NIM'=>$this->input->post('nim'),
                            'Name'=>$this->input->post('name'),
                            'Gender'=>$this->input->post('gender'),  
                            'Address'=>$this->input->post('address'),
                            'Phone'=>$this->input->post('phone'),
                            'Update_at'=>get_current_date()                    
                          );               
        $editmahasiswa= $this->Model_mahasiswa->update_mahasiswa($id,$mahasiswa);
        if($editmahasiswa)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
    }

    function editStatusmahasiswa()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $mahasiswa = array(
                        'Status'=>$status
                        );
        $editmahasiswa= $this->Model_mahasiswa->update_mahasiswa($id,$mahasiswa);
        if($editmahasiswa)
        {   
            $this->session->set_flashdata('Status','Edit Succes');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Edit Failed');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
    }

    function deletemahasiswa()
    {
        $id=$this->input->get('id');
        $deletemahasiswa = $this->Model_mahasiswa->delete_mahasiswa($id);
        if($deletemahasiswa)
        {   
            $this->session->set_flashdata('Status','Delete Succes');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
        else
        {
            $this->session->set_flashdata('Status','Delete Failed');
            redirect('M_mahasiswa/M_mahasiswa/get_mahasiswa');
        }
        
    }
}
?>