<?php
class user_model extends CI_model
{
    function create($formArray){
        $this->db->insert('users',$formArray);
    }

    function all(){
    return $users=$this->db->get('users')->result_array();
    }

    function getuser($userId){
    $this->db->where('user_id',$userId);
    return $users=$this->db->get('users')->row_array();

    }
    function updateuser($userId,$formArray){
        $this->db->where('user_id',$userId);
        $this->db->update('users',$formArray);
    }

    function deleteuser($userId){
        $this->db->where('user_id',$userId);
        $this->db->delete('users');


    }
}
?>