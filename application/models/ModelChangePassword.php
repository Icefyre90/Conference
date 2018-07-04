<?php

class ModelChangePassword extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function checkOldPassword($iduser, $username, $opassword){
        $this->db->where('iduser', $iduser);
        $this->db->where('username', $username);
        $this->db->where('password',$opassword);
        $result=$this->db->get('user');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    
    public function updateNewPassword($iduser, $username, $npassword){
        $this->db->where('iduser', $iduser);
        $this->db->where('username', $username);
        $this->db->set('password', $npassword);
        $this->db->update('user');
    }
}
