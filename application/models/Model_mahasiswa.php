<?php
class Model_mahasiswa extends CI_Model{

    function get_mahasiswa()
    {
       
        $datamahasiswa = $this->db->get('tb_mahasiswa')->result();
        return $datamahasiswa;
    }
      
    function get_mahasiswa_by_id($idmahasiswa)
    {   
        $this->db->where("Id",$idmahasiswa);
        $getmahasiswaById = $this->db->get('tb_mahasiswa')->row();
        return $getmahasiswaById;
    }

    function get_mahasiswa_by_status()
    {   
        $this->db->where("Status",'Aktif');
        $getmahasiswaByStatus = $this->db->get('tb_mahasiswa')->result();
        return $getmahasiswaByStatus;
    }

    function add_mahasiswa($datamahasiswa)
    {
        $addmahasiswa=$this->db->insert("tb_mahasiswa",$datamahasiswa);
        return $addmahasiswa;
    }

    function update_mahasiswa($idmahasiswa,$datamahasiswa)
    {
        $this->db->where('Id',$idmahasiswa);
        $updatemahasiswa=$this->db->update("tb_mahasiswa",$datamahasiswa);
        return $updatemahasiswa;
    }

    function delete_mahasiswa($idmahasiswa)
    {
        $this->db->where('Id',$idmahasiswa);
        $deletemahasiswa=$this->db->delete("tb_mahasiswa");
        return $deletemahasiswa;
    }
}
?>