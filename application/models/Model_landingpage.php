<?php
class Model_landingpage extends CI_Model{

    function get_user_mahasiswa()
    {   

        $getuser_mahasiswa = $this->db->get('tb_user')->result();
        return $getuser_mahasiswa;
    }

    function get_user_mahasiswa_by_user($username)
    {   
        $this->db->where("Username",$username);
        $getloginbyuser = $this->db->get('tb_user')->row();
        return $getloginbyuser;
    }
    
    function get_user_mahasiswa_by_user_password($username,$password)
    {   
        $this->db->select('tb_user.*,tb_karyawan.Status as StatusKaryawan');
        $this->db->from('tb_user');
        $this->db->join('tb_karyawan','tb_karyawan.Id=tb_user.Karyawan_id');
        $this->db->where("tb_user.Username",$username);
        $this->db->where("tb_user.Password",$password);
        $this->db->where("tb_karyawan.Status",'Aktif');
        $getloginbyuserpass = $this->db->get()->row();
        return $getloginbyuserpass;
    }

    function get_user_mahasiswa_by_id($id)
    {   
        $this->db->where("Id",$id);
        $getloginbyId = $this->db->get('tb_user')->row();
        return $getloginbyId;
    }

    function add_user_mahasiswa($datauser_mahasiswa)
    {
        $adduser_mahasiswa=$this->db->insert("tb_user",$datauser_mahasiswa);
        return $adduser_mahasiswa;
    }

    function update_user_mahasiswa($iduser_mahasiswa,$datauser_mahasiswa)
    {
        $this->db->where('Id',$iduser_mahasiswa);
        $updateuser_mahasiswa=$this->db->update("tb_user",$datauser_mahasiswa);
        return $updateuser_mahasiswa;
    }

    function delete_user_mahasiswa($iduser_mahasiswa)
    {
        $this->db->where('Id',$iduser_mahasiswa);
        $deleteuser_mahasiswa=$this->db->delte("tb_user");
        return $deleteuser_mahasiswa;
    }


}
?>