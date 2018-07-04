<?php

class ModelUser extends CI_Model {

    public $username;
    public $first_name;
    public $last_name;
    public $id;
    public $coordinator;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function usernameExist() {
        $this->db->where('username', $this->username);
        $result = $this->db->get('user');
        if ($result->result())
            return TRUE;
        else
            return false;
    }

    public function coordinatorExist() {

//      $query = $this->db->get_where('user', array('coordinator' => true));
//        $result=$this->db->get('user');
        if ($this->coordinator == 1)
            return TRUE;
        else
            return false;
    }

    public function correctPassword($password) {
        $this->db->where('username', $this->username);
        $this->db->where('password', $password);
        $result = $this->db->get('user');
        $user = $result->row_array();

        if ($user != NULL) {
            $this->first_name = $user['first_name'];
            $this->last_name = $user['last_name'];
            $this->phone_number = $user['phone_number'];
            $this->email = $user['email'];
            $this->organisation = $user['organisation'];
            $this->date_of_birth = $user['date_of_birth'];
            $this->coordinator = $user['coordinator'];
            $this->iduser = $user['iduser'];
            return TRUE;
        } else
            return false;
    }

    public function myProfile($username = NULL) {
        if ($username != NULL)
            $this->db->where("username", $username);
        $query = $this->db->get('user');
        $result = $query->result_array();
        return $result;
    }

    public function modelMyConferences($iduser = NULL) {
        if ($iduser != NULL)
            $query = $this->db->query('SELECT * FROM user, user_has_conference, conference
WHERE iduser=' . $iduser . ' and user_iduser=' . $iduser . ' and idconference =conference_idconference');
        $result = $query->result_array();
        return $result;
    }

    public function myproject($param) {
        $query = $this->db->query("SELECT * from project, user, conference, autor, conference_has_project where project.idproject=autor.project_idproject and conference_idconference=idconference and iduser=user_iduser AND conference_has_project.project_idproject=project.idproject and iduser='" . $param . "' and core='" . $param . "' Order by idproject DESC");
        $result = $query->result_array();
        return $result;
    }

    public function myCoproject($param) {
        $query = $this->db->query("SELECT * from project, user, conference, autor, conference_has_project where project.idproject=autor.project_idproject and conference_idconference=idconference and iduser=user_iduser AND conference_has_project.project_idproject=project.idproject and iduser='" . $param . "' and core!='" . $param . "' Order by idproject DESC");
        $result = $query->result_array();
        return $result;
    }

    public function projectofconf($idconference) {
        $query = $this->db->query("Select * from conference, conference_has_project, project where idconference=conference_idconference and idproject=project_idproject and idconference='.$idconference.'");
        $result = $query->result();
        return $result;
    }

    public function reviewer_invitation($usernames, $conferenc) {
        $this->db->set("user_iduser", $usernames);
        $this->db->set("conference_idconference", $conferenc);
        $this->db->insert("reviewer");
        $this->db->insert_id();
    }

    public function projectstatschange($idproject) {
        $this->db->where('idproject', $idproject);
        $this->db->set("status", "2");
        $this->db->update('project');
    }

    public function myProjFile($idproject, $project_name, $time) {
        $this->db->where("project_idproject", $idproject);
        $this->db->set("time", $time);
        $this->db->update("project_file");
    }

    public function reviewtask($param) {
        $query = $this->db->query("SELECT * FROM conference, conference.review, reviewer, user, project, project_file where user.iduser=user_iduser and idconference=conference_idconference and idreviewer=reviewer_idreviewer and review.project_idproject=project.idproject and project_file.project_idproject=project.idproject and iduser=" . $param . " and project_status=2 ");
        $result = $query->result_array();
        return $result;
    }

    public function statusreviewfinish($idproject) {
        $this->db->where('idproject', $idproject);
        $this->db->set("status", "3");
        $this->db->update('project');
    }

    public function idreview($idproject, $iduser) {
        $query = $this->db->query("SELECT idreview FROM conference, conference.review, reviewer, user, project, project_file where user.iduser=user_iduser and idconference=conference_idconference and idreviewer=reviewer_idreviewer and review.project_idproject=project.idproject and project_file.project_idproject=project.idproject and iduser=" . $iduser . " and idproject=" . $idproject . "");
        $result = $query->result_array();
        return $result;
    }

    public function updatereview($idrevi, $mark, $comment) {
        $this->db->where('idreview', $idrevi);
        $this->db->set("rating", $mark);
        $this->db->set("comment", $comment);
        $this->db->set("project_status", "3");
        $this->db->update('review');
    }

}
