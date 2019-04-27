<?php
class Model_admin extends CI_Model{

    function get_admin()
    {   

        $getAdmin = $this->db->get('tb_user')->result();
        return $getAdmin;
    }

    function get_admin_by_user($username)
    {   
        $this->db->where("Username",$username);
        $getloginbyuser = $this->db->get('tb_user')->row();
        return $getloginbyuser;
    }
    
    function get_admin_by_user_password($username,$password)
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

    function get_admin_by_id($id)
    {   
        $this->db->where("Id",$id);
        $getloginbyId = $this->db->get('tb_user')->row();
        return $getloginbyId;
    }

    function add_admin($dataAdmin)
    {
        $addAdmin=$this->db->insert("tb_user",$dataAdmin);
        return $addAdmin;
    }

    function update_admin($idAdmin,$dataAdmin)
    {
        $this->db->where('Id',$idAdmin);
        $updateAdmin=$this->db->update("tb_user",$dataAdmin);
        return $updateAdmin;
    }

    function delete_admin($idAdmin)
    {
        $this->db->where('Id',$idAdmin);
        $deleteAdmin=$this->db->delte("tb_user");
        return $deleteAdmin;
    }


}
?>