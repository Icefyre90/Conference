<?php

class ControllerChangePassword extends CI_Controller {
    public $username;
    public $controller;

    public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model("ModelChangePassword");
        $this->load->library('session');
        if ($this->session->userdata('user') == NULL) {
            redirect('Guest/index');
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "admin";
        } else {
            $this->controller = "user";
        }

    }

    public function index($message = NULL) {
            $data['message'] = $message;
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        if($this->controller=="admin"){$this->load->view("main/admin_sidebar.php");}
        $this->load->view('forms/change_password', $data);

        $this->load->view("template/footer.php");
    }

    public function changePW($message = NULL) {
        $iduser = $this->session->userdata('user')->iduser;
        $username = $this->session->userdata('user')->username;
        $data = array();
        if ($message)
            $data['message'] = $message;
        $this->form_validation->set_rules('opassword', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('npassword', 'New Password', 'required|trim|min_length[6]|max_length[12]|alpha_numeric|password_check[1,1,1,1]');
        $this->form_validation->set_rules('cpassword', 'Re-enter Password', 'required|trim|matches[npassword]');
        $this->form_validation->set_message("required", "Field {field} is empty.");
        $this->form_validation->set_message("matches[npassword]", "Field {field} does not match new password.");
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } 
        else if (!$this->ModelChangePassword->checkOldPassword($iduser, $username, $this->input->post('opassword'))) {
            $this->index("Incorrect password!");
        }
        else if ($this->input->post('opassword') == $this->input->post('npassword')) {
            $this->index("You can't enter the same password like your old one!");
        }
        else {
            //ispravno
            $npassword = $this->input->post("npassword");
            $this->ModelChangePassword->updateNewPassword($iduser, $username, $npassword);
            $successPW= $this->session->set_flashdata('successPW', 'You have successfully changed your password!');
            if ($this->session->userdata('user')->coordinator == "1"){
                $successPW;
                redirect('Admin/myProfile');
                
            } else {
                $successPW;
                redirect('User/myProfile');
                
            }
            

            
        }
    }

}
