<?php

class Guest extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');
        if ($this->session->userdata('user') == NULL) {
            $this->controller = "guest";
            $controller = "Guest";
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "admin";
            $controller = "Admin";
            redirect("Admin");
        } else {
            $this->controller = "user";
            redirect("user");
        }
//            session_destroy();
    }

    private function loadView($data, $mainPart) {

        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

//$offset = 0
    public function index() {

        if ($this->uri->segment(3))
            $indexnum = $this->uri->segment(3);
        else
            $indexnum = 0;

        $limit = 3;
        $conferencenum = $this->db->count_all('conference');
        $data['confdatapag'] = $this->Search_model->conference($limit, $indexnum);

        $this->load->library('pagination'); // ovo moze i u  config/autoload.php da se doda
        $this->config->load('bootstrap_pagination'); //moze i u autoload.php

        $config_pagination = $this->config->item('pagination');
        $config_pagination['base_url'] = site_url("Guest/index");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();

        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $nextconference = $this->Search_model->nextconference();
        $data['nextconference'] = $nextconference;
        $controller = "";
        $data['controller'] = $controller;
        $data['controller'] = "Guest";

        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function login($message = NULL) {

        $data = array();
        if ($message)
            $data['message'] = $message;
        $conference_data = $this->Search_model->conference();
        if ($this->uri->segment(3))
            $indexnum = $this->uri->segment(3);
        else
            $indexnum = 0;

        $limit = 3;
        $conferencenum = $this->db->count_all('conference');
        $data['confdatapag'] = $this->Search_model->conference($limit, $indexnum);

        $this->load->library('pagination'); // ovo moze i u  config/autoload.php da se doda
        $this->config->load('bootstrap_pagination'); //moze i u autoload.php

        $config_pagination = $this->config->item('pagination');
        $config_pagination['base_url'] = site_url("Guest/index");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Guest";
        $data['title_page'] = "Log in";
        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function login_validation() {
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required", "Field {field} is empty.");
        if ($this->form_validation->run()) {
            $this->ModelUser->username = $this->input->post('username');
            if (!$this->ModelUser->usernameExist()) {
                $this->login("Incorrect username!");
            } else if (!$this->ModelUser->correctPassword($this->input->post('password'))) {
                $this->login("Incorrect password!");
            } else if ($this->ModelUser->coordinatorExist() == TRUE) {
                $this->session->set_userdata('user', $this->ModelUser);
                redirect("Admin/index");
            } else {
                $this->load->library('session');
                $this->session->set_userdata('user', $this->ModelUser);
                redirect("User/index");
            }
        } else
            $this->login();
    }

    public function registerUser() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]|alpha_numeric|password_check[1,1,1,1]');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('organisation', 'Organisation', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date of birth', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            //ispravno
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $first_name = $this->input->post("first_name");
            $last_name = $this->input->post("last_name");
            $phone_number = $this->input->post("phone_number");
            $email = $this->input->post("email");
            $organisation = $this->input->post("organisation");
            $date_of_birth = $this->input->post("date_of_birth");
            $this->ModelRegistration->register($username, $password, $first_name, $last_name, $phone_number, $email, $organisation, $date_of_birth);
            $this->session->set_userdata('user', $this->ModelUser);
            redirect("User/index");
        }
    }

    public function conferenceview() {

        $data['info'] = '$info_vesti';
        $this->load->view("template/header_guest.php");
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

    public function dataconf($idconf) { //podaci o konferencijam
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $controller = "Guest";
        $data['controller'] = $controller;

        $datacon = $this->Search_model->getInfoConf($idconf);
        $data['confinfo'] = $datacon;
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

}
