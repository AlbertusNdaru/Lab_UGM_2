<?php
class Model_usergroup extends CI_Model{

    function get_usergroup()
    {
        $datausergroup = $this->db->get('tb_usergroup')->result();
        return $datausergroup;
    }
      
    function get_usergroup_by_id($idusergroup)
    {   
        $this->db->where("Id",$idusergroup);
        $getusergroupById = $this->db->get('tb_usergroup')->row();
        return $getusergroupById;
    }

    function add_usergroup($datausergroup)
    {
        $addusergroup=$this->db->insert("tb_usergroup",$datausergroup);
        return $addusergroup;
    }

    function update_usergroup($idusergroup,$datausergroup)
    {
        $this->db->where('Id',$idusergroup);
        $updateusergroup=$this->db->update("tb_usergroup",$datausergroup);
        return $updateusergroup;
    }

    function delete_usergroup($idusergroup)
    {
        $this->db->where('Id',$idusergroup);
        $deleteusergroup=$this->db->delete("tb_usergroup");
        return $deleteusergroup;
    }
}
?>