<?php
class Model_user extends CI_Model{

    function get_user()
    {
        $this->db->select('a.*, b.Description as UsergroupDes, c.Name as KaryawanName');
        $this->db->from('tb_user as a');
        $this->db->join('tb_usergroup as b', 'b.Id =a.Usergroup_id');
        $this->db->join('tb_karyawan as c ',' c.Id=a.Karyawan_id');        
        $datauser = $this->db->get()->result();
        return $datauser;
    }
      
    function get_user_by_id($iduser)
    {   
        $this->db->where("Id",$iduser);
        $getuserById = $this->db->get('tb_user')->row();
        return $getuserById;
    }

    function add_user($datauser)
    {
        $adduser=$this->db->insert("tb_user",$datauser);
        return $adduser;
    }

    function update_user($iduser,$datauser)
    {
        $this->db->where('Id',$iduser);
        $updateuser=$this->db->update("tb_user",$datauser);
        return $updateuser;
    }

    function delete_user($iduser)
    {
        $this->db->where('Id',$iduser);
        $deleteuser=$this->db->delete("tb_user");
        return $deleteuser;
    }
}
?>