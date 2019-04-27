<?php
class Model_user_group extends CI_Model{

    function get_user_group()
    {
        $datauser_group = $this->db->get('tb_usergroup')->result();
        return $datauser_group;
    }
      
    function get_user_group_by_id($iduser_group)
    {   
        $this->db->where("Id",$iduser_group);
        $getuser_groupById = $this->db->get('tb_usergroup')->row();
        return $getuser_groupById;
    }

    function add_user_group($datauser_group)
    {
        $adduser_group=$this->db->insert("tb_usergroup",$datauser_group);
        return $adduser_group;
    }

    function update_user_group($iduser_group,$datauser_group)
    {
        $this->db->where('Id',$iduser_group);
        $updateuser_group=$this->db->update("tb_usergroup",$datauser_group);
        return $updateuser_group;
    }

    function delete_user_group($iduser_group)
    {
        $this->db->where('Id',$iduser_group);
        $deleteuser_group=$this->db->delte("tb_usergroup");
        return $deleteuser_group;
    }
}
?>