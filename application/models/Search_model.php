<?php

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_data($var) {
        $query = $this->db->query("SELECT u.first_name, u.last_name, p.project_name FROM autor as a
            join user as u on u.iduser = a.user_iduser
            join project as p on p.idproject = a.project_idproject where status='1' and core=iduser and (
u.first_name LIKE '%{$var}%' OR u.last_name LIKE '%{$var}%' OR
p.project_name LIKE '%{$var}%')");

//$query= $this->db->query("SELECT first_name, last_name, project_name FROM user, autor, project
//WHERE iduser=user_iduser AND project_idproject= idproject and
//first_name LIKE '%{$var}%' OR last_name LIKE '%{$var}%' OR
//project_name LIKE '%{$var}%'"); lik kida radi sve drugi nacin
        return $query->result();
    }

//$limit = FALSE, $offset = FALSE
    public function conference($limit = 1000, $pocetak = 0) {
        if ($limit) {
            $query = $this->db->get('conference', $limit, $pocetak);
        } else {
            $query = $this->db->get();
        }
//prikazujem prvih deset vesti
        $result = $query->result_array(); //vraca niz vesti
        return $result;
    }

    public function users() {
        $query = $this->db->get("user");
        $result = $query->result_array();
        return $result;
    }

    public function getInfoConf($idconf) {

//        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end ");
        $this->db->from("conference");
        $this->db->where("idconference", $idconf);
        $query = $this->db->get();
        return $query->result_array(); //vraca jednu vest
    }

    public function conference_fieldlist($param) {
        $query = $this->db->query("Select name_field from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and title='$param'");
        $result = $query->result();
        return $result;
    }

    public function get_country_query() {
        $query = $this->db->get('conference');
        return $query->result();
    }

    public function get_province_query($idconference) {
        $query = $this->db->query("Select name_field, idfield from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and idconference='$idconference'");
        return $query->result();
    }

    public function field($idfield) {
        $this->db->from("field");
        $this->db->where("idfield", $idfield);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function all_field() {
        $query = $this->db->get('field');
        return $query->result_array();
    }

    public function findUserByUsername($username) {
        $query = $this->db->query("Select iduser from user where  username='$username'");
        $result = $query->result_array();
        return $result;
    }

    public function myconference($iduser, $limit = 1000, $pocetak = 0) {

        $query = $this->db->query('SELECT * FROM user, user_has_conference, conference
WHERE iduser=' . $iduser . ' and user_iduser=' . $iduser . ' and idconference =conference_idconference LiMIT ' . $limit . ' OFFSET ' . $pocetak . '');

        $result = $query->result_array(); //vraca niz vesti
        return $result;
    }

    public function myprojectofconf($idconference) {
        $query = $this->db->query("SELECT * FROM conference, conference_has_project, project, user, autor
where idconference=conference_idconference and idproject=conference_has_project.project_idproject and idproject=autor.project_idproject and iduser=autor.user_iduser and project.core=user.iduser  and idconference=" . $idconference . " and status!='5' group by project.idproject");
        $result = $query->result_array();
        return $result;
    }

    public function delete_projectformconf($param) {
        $this->db->where('idproject', $param);
        $this->db->set("status", "5");
        $this->db->update('project');
    }

    public function add_projectformconf($param) {
        $this->db->where('idproject', $param);
        $this->db->set("status", "0");
        $this->db->update('project');
    }

    public function projinconffinal($param) {
        $this->db->where('idproject', $param);
        $this->db->set("status", "1");
        $this->db->update('project');
    }

    public function projectinfo($param) {
        $query = $this->db->query("SELECT * FROM project, user, autor where user_iduser=iduser and project_idproject=idproject and iduser=project.core and idproject=" . $param . " group by idproject ");

        $result = $query->result_array();
        return $result;
    }

    public function coautors($param) {
        $query = $this->db->query("SELECT * FROM project, user, autor where user_iduser=iduser and project_idproject=idproject and idproject=" . $param . " and core!=iduser group by iduser");

        $result = $query->result_array();
        return $result;
    }

    public function competence($param) {
        $query = $this->db->query("SELECT * FROM project, user, autor where user_iduser=iduser and project_idproject=idproject and idproject=" . $param . " and core!=iduser group by iduser");

        $result = $query->result_array();
        return $result;
    }

    public function addinconfproject($idconference) {
        $query = $this->db->query("SELECT * FROM conference, conference_has_project, project, user, autor
where idconference=conference_idconference and idproject=conference_has_project.project_idproject and idproject=autor.project_idproject and iduser=autor.user_iduser and project.core=user.iduser  and idconference=" . $idconference . " and status='5' group by project.idproject");

        $result = $query->result_array();
        return $result;
    }

    public function infoRewforConf($idconference) {
        $query = $this->db->query("Select * from user, reviewer, conference, field, conference_has_field, competence
where iduser=user_iduser and reviewer.conference_idconference=idconference and field_idfield=idfield and conference_has_field.conference_idconference=conference.idconference and
competence.reviewer_idreviewer=idreviewer and competence.conference_has_field_id_conference_has_field=id_conference_has_field and idconference=" . $idconference . "");

        $result = $query->result_array();
        return $result;
    }

    public function fieldformconforproj($idproject) {
        $query = $this->db->query("select * from project, conference, field, conference_has_project, conference_has_field where idproject=project_idproject and conference_has_project.conference_idconference=idconference and idconference=conference_has_field.conference_idconference and field.idfield=conference_has_field.field_idfield and idproject=" . $idproject . "");
        $result = $query->result_array();
        return $result;
    }

    public function listofrewincof($idconference) {
        $query = $this->db->query("select * from conference, reviewer, competence, user  where idconference=conference_idconference and iduser=user_iduser and reviewer_idreviewer=idreviewer and idconference=" . $idconference . " group by idreviewer");
        $result = $query->result_array();
        return $result;
    }

    public function get_competenceofrew($idreviewer, $idconference) {
        $query = $this->db->query("select * from conference, reviewer, competence, user, conference_has_field, field  where idconference=reviewer.conference_idconference and iduser=user_iduser and reviewer_idreviewer=idreviewer
 and idconference=" . $idconference . " and idfield=field_idfield and conference_has_field.conference_idconference=idconference and conference_has_field_id_conference_has_field=id_conference_has_field and idreviewer=" . $idreviewer . " ;");
        $result = $query->result_array();
        return $result;
    }

    public function ReturnToAutor($param) {
        $this->db->where('idproject', $param);
        $this->db->set("status", "4");
        $this->db->update('project');
    }

    public function Send_to_review($idreviewer, $idproject, $date) {
        $this->db->set("date_for_review", $date);
        $this->db->set("project_idproject", $idproject);
        $this->db->set("reviewer_idreviewer", $idreviewer);
        $this->db->set("project_status", "2");
        $this->db->insert("review");
    }

    public function Send_to_reviewstatus($data) {
        $this->db->where('idproject', $data);
        $this->db->set("status", "2");
        $this->db->update('project');
    }

    public function reviewerofproject($data) {
        $query = $this->db->query("select * from review,user, reviewer where project_idproject=" . $data . " and reviewer_idreviewer=idreviewer and user_iduser=iduser");
        $result = $query->result_array();
        return $result;
    }

    public function Status_in_review($data) {
        $this->db->where('project_idproject', $data);
        $this->db->set("project_status", "2");
        $this->db->update('review');
    }

    public function nextconference() {
        $query = $this->db->query("select *,min(event_begin) FROM conference.conference where event_begin >= CURRENT_DATE()");
        $result = $query->result_array();
        return $result;
    }

}

//