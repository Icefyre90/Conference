<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');

        if ($this->session->userdata('user') == NULL) {
            redirect("Guest");
        }
        $this->session->flashdata('successPW');
        $this->session->flashdata('successSentEmail');


        if ($this->session->userdata('user') == NULL) {
            $this->controller = "guest";
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "admin";
        } else {
            $this->controller = "user";
            redirect("User");
        }
    }

    public function loadView($data, $mainPart) {

        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

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
        $config_pagination['base_url'] = site_url("Admin/index");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();

        $data['controller'] = "Admin";
        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function myProfile() {
        $data['controller'] = "Admin";
        $data['successPW'] = $this->session->flashdata('successPW');
        $data['successEmail'] = $this->session->flashdata('successEmail');
        //$data['successFirst']= $this->session->flashdata('successFirst');
        $idUser = $this->session->userdata("user")->username;

        $mydata = '';
        $mydata = $this->ModelUser->myProfile($idUser);
        $data['mydata'] = $mydata;
        $this->loadView($data, "main/user_myprofile.php");
    }

    public function logout() {
        $this->session->unset_userdata("User");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }

    public function addImage() {
        $this->loadView(array(), "user_myprofile.php");
    }

    public function addingImage() {
        $userID = $this->session->userdata('user')->iduser;
        $config['upload_path'] = './image/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;
        $config['file_name'] = "profile_" . $userID;

        $this->load->library('upload', $config);
        if (!file_exists("image/profile/profile_" . $userID . ".jpg")) {
            $this->upload->do_upload('image');
            redirect("Admin/myProfile");
        } else if (file_exists("image/profile/profile_" . $userID . ".jpg")) {
            unlink('image/profile/' . "profile_" . $userID . ".jpg");
            $this->upload->do_upload('image');
            redirect("Admin/myProfile");
        } else
            $this->upload->do_upload('image');
        redirect("Admin/myProfile");
    }

    public function showImage($idUser) {
        $user = $this->ModelUser->myProfile($idUser);
        $data['user'] = $user;
        $data['controller'] = "Admin";

        $this->loadView($data, "user_myprofile.php");
    }

    public function conferences() {

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
        $config_pagination['base_url'] = site_url("Admin/conferences");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();

        $data['controller'] = "Admin";
        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function conferenceview() {

        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

    public function dataconf($idconf) { //podaci o konferencijam
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $controller = "";
        $data['controller'] = $controller;

        $datacon = $this->Search_model->getInfoConf($idconf);
        $data['confinfo'] = $datacon;
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

    public function myConferences() {
        $idUser = $this->session->userdata("user")->iduser;
        if ($this->uri->segment(3))
            $indexnum = $this->uri->segment(3);
        else
            $indexnum = 0;

        $limit = 6;
        $conferencenum = $this->db->count_all('conference');
        $data['confdatapag'] = $this->Search_model->myconference($idUser, $limit, $indexnum);

        $this->load->library('pagination'); // ovo moze i u  config/autoload.php da se doda
        $this->config->load('bootstrap_pagination'); //moze i u autoload.php

        $config_pagination = $this->config->item('pagination');
        $config_pagination['base_url'] = site_url("Admin/myConferences");
        $config_pagination['total_rows'] = 5;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $controller = "";
        $data['controller'] = $controller;


        $iduser = $this->session->userdata("user")->iduser;
        $myconf = $this->ModelUser->modelMyConferences($iduser);
        $data['myconf'] = $myconf;
        $this->loadView($data, "main/admin_my_conference.php");
    }

    public function reviewerEmailInvitation() {
        $data['successSentEmail'] = $this->session->flashdata('successSentEmail');
        $this->loadView($data, "forms/admin_reviewer_email_invitation.php");

//        $this->load->view("main/admin_sidebar.php");
    }

    public function sendEmail() {
        $this->form_validation->set_rules('senderEmail', 'Sender Email', 'required|trim');
        $this->form_validation->set_rules('passwordEmail', 'Email password', 'required|trim');
        $this->form_validation->set_rules('recipientEmail', 'Recipient Email', 'required|trim');
        $this->form_validation->set_message("required", "Field {field} is empty.");
        if ($this->form_validation->run() == FALSE) {
//             // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            $first_name = $this->session->userdata('user')->first_name;
            $last_name = $this->session->userdata('user')->last_name;
            $full_name = $first_name . " " . $last_name;
            $senderEmail = $this->input->post("senderEmail");
            $passwordEmail = $this->input->post("passwordEmail");
            $recipientEmail = $this->input->post("recipientEmail");
            $subject = $this->input->post("subject");
            $messageEmail = $this->input->post("messageEmail");
        }
        $config = Array(
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => $senderEmail,
            'smtp_pass' => $passwordEmail,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->from($senderEmail, $full_name);
        $this->email->set_newline("\r\n");
        $this->email->to($recipientEmail);
        $this->email->subject($subject);
        $this->email->message($messageEmail);

        $this->email->send();
        $this->email->print_debugger();
        $successSentEmail = $this->session->set_flashdata('successSentEmail', 'You have successfully sent a email!');
        $successSentEmail;
        redirect('Admin/reviewerEmailInvitation');
    }

    // OVO TEK TREBA DA SE RADI
    public function reviewerInvitation() {

        $users = $this->Search_model->users();
        $data['users'] = $users;
        $mydata = $this->Search_model->conference();
        $data['mydata'] = $mydata;
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Admin";

        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("forms/admin_reviewer_invitation.php", $data);
        $this->load->view("template/footer.php");
    }

//    TO DO
    public function sendInv() {
        $this->form_validation->set_rules('usernames', 'Usernames', 'required');
        $this->form_validation->set_rules('conferenc', 'conferenc', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->reviewerInvitation(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            $usernames = $this->input->post("usernames");
            $conferenc = $this->input->post("conferenc");
            $this->ModelUser->reviewer_invitation($usernames, $conferenc);
            redirect("Admin/reviewerInvitation");
        }
    }

    public function addnewConference() {

        $conference_data = $this->Search_model->conference();
        $field_data = $this->Search_model->all_field();
        $data['field_data'] = $field_data;
        $data['confdata'] = $conference_data;
        $data['controller'] = "Admin";

        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
//        $this->load->view("main/admin.php", $data);
        $this->load->view("main/admin_addnew_conference.php", $data);
        $this->load->view("template/footer.php");
    }

    public function createConference($message = NULL) {
        $data = array();
        if ($message)
            $data['message'] = $message;

        $this->form_validation->set_rules('title', 'Conference name', 'required|min_length[6]');
        $this->form_validation->set_rules('place', 'Place', 'required');
        $this->form_validation->set_rules('event_begin', 'Event Begin', 'required');
        $this->form_validation->set_rules('event_end', 'Event end', 'required');
        $this->form_validation->set_rules('application_begin', 'Application begin', 'required');
        $this->form_validation->set_rules('application_end', 'Application end', 'required');
        $this->form_validation->set_rules('projects_per_autor', 'Projects per autor', 'required');
        $this->form_validation->set_rules('field', 'Field', 'required');
        $this->form_validation->set_message("required", "Field {field} is empty.");


        if ($this->form_validation->run() == FALSE) {
            $this->addnewConference(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            //ispravno
            $title = $this->input->post("title");
            $place = $this->input->post("place");
            $event_begin = $this->input->post("event_begin");
            $event_end = $this->input->post("event_end");
            $application_begin = $this->input->post("application_begin");
            $application_end = $this->input->post("application_end");
            $projects_per_autor = $this->input->post("projects_per_autor");
            $idfield = $this->input->post("field");
            $idconf = $this->ModelRegistration->newConference($title, $place, $event_begin, $event_end, $application_begin, $application_end, $projects_per_autor);

            $this->ModelRegistration->confHasField($idfield, $idconf);
            $iduser = $this->session->userdata('user')->iduser;
            $successAddConf = $this->session->set_flashdata('successAddConf', 'You have successfully created a new conference!');
            $this->ModelRegistration->userHasConference($idconf, $iduser);

//
//            $config['upload_path'] = './image/conference/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 2048;
//            $config['max_width'] = 2048;
//            $config['max_height'] = 1080;
//            $config['file_name'] = "conference_" . $idconf;
//
//            $this->load->library('upload', $config);
//            if (!file_exists("image/conference/conference_" . $idconf . ".jpg")) {
//                $this->upload->do_upload('imageConf');
//            } else if (file_exists("image/conference/conference_" . $idconf . ".jpg")) {
//                unlink('image/conference/' . "conference_" . $idconf . ".jpg");
//                $this->upload->do_upload('imageConf');
//            }
            $successAddConf;
            redirect("Admin/index");
        }
    }

    public function addnewField() {

        $field_data = $this->Search_model->all_field();
        $data['field_data'] = $field_data;
        $data['controller'] = "Admin";

        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("main/admin_addnew_field.php", $data);
        $this->load->view("template/footer.php");
    }

    public function createField($message = NULL) {
        $data = array();
        if ($message)
            $data['message'] = $message;

        $this->form_validation->set_rules('fieldName', 'Field name', 'required|min_length[4]');
        $this->form_validation->set_message("required", "Field {field} is empty.");

        if ($this->form_validation->run() == FALSE) {
            $this->addnewField(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            $fieldName = $this->input->post("fieldName");
            $idfield = $this->ModelRegistration->newField($fieldName);
            $successAddField;
            redirect("Admin/index");
        }
    }

//    DODAVANJE SLIKE U CONF
    public function addConfImage() {
        $this->loadView(array(), "user_myprofile.php");
    }

    public function addingConfImage() {
        $userID = $this->session->userdata('user')->iduser;
        $config['upload_path'] = './image/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 2048;
        $config['max_height'] = 1024;
        $config['file_name'] = "profile_" . $userID;

        $this->load->library('upload', $config);
        if (!file_exists("image/profile/profile_" . $userID . ".jpg")) {
            $this->upload->do_upload('image');
            redirect("User/myProfile");
        } else if (file_exists("image/profile/profile_" . $userID . ".jpg")) {
            unlink('image/profile/' . "profile_" . $userID . ".jpg");
            $this->upload->do_upload('image');
            redirect("User/myProfile");
        } else
            $this->upload->do_upload('image');
        redirect("User/myProfile");
    }

//    TO DO
    public function projects() {
        $iduser = $this->session->userdata("user")->iduser;
        $myconf = $this->ModelUser->modelMyConferences($iduser);
        $data['myconf'] = $myconf;
        $data['controller'] = "Admin";
        $this->load->view("template/header_admin.php");
        $this->load->view("main/admin_sidebar.php");
        $this->load->view("main/admin_projects.php", $data);
        $this->load->view("template/footer.php");
    }

    // public function addnewconf() {
    //$data['controller'] = "Admin";
    //$this->load->view("template/header_admin.php");
    //$this->load->view("main/admin_addnew_conference.php");
    //$this->load->view("template/footer.php");
    // }
    public function projectofconf() {
        $idconference = $this->input->post('idconference');
        $projectofconf = $this->ModelUser->projectofconf($idconference);
        if (count($projectofconf) > 0) {
            $pro_table = 'nesto';

            foreach ($projectofconf as $field) {
                $pro_table .= '<tr>';
                $pro_table .= '<td value="' . $field->idproject . '">' . $field->project_name . '</>';
                $pro_table .= '</tr>';
            }
            echo $pro_table;
        }
    }

    public function edit_My_Profile() {
        $idUser = $this->session->userdata("user")->username;
        $mydata = $this->ModelUser->myProfile($idUser);
        $data['mydata'] = $mydata;
        $data['controller'] = "Admin";
        $this->loadView($data, "main/user_editmyprofile.php");
    }

    public function editMyProfile() {
        //if ($this->input->post("submitMyEditProfile") !== NULL) {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone number', 'required');
        $this->form_validation->set_rules('organisation', 'Organisation', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date of birth', 'required');
        $this->form_validation->set_message('valid_email', 'Your email address is invalid. Please enter a valid address.');
        if ($this->form_validation->run() == FALSE)
            $this->edit_My_Profile();
        else {

            $iduser = $this->session->userdata("user")->iduser;
            $first_name = $this->input->post("first_name");
            $last_name = $this->input->post("last_name");
            $phone_number = $this->input->post("phone_number");
            $email = $this->input->post("email");
            $organisation = $this->input->post("organisation");
            $date_of_birth = $this->input->post("date_of_birth");
            $this->ModelRegistration->changeMyProfile($iduser, $first_name, $last_name, $phone_number, $email, $organisation, $date_of_birth);
            $successEmail = $this->session->set_flashdata('successEmail', 'You have successfully changed your email address.');
            if ($this->session->userdata('user')->coordinator == "1") {
                $successEmail;
                redirect('Admin/myProfile');
            } else {
                $successEmail;
                redirect('User/myProfile');
            }
            //$successFirst= $this->session->set_flashdata('successFirst', 'You have successfully changed your first name.');
        }
    }

    // }

    public function selectprojectofconf() {
        $ididid = $this->input->post('idconference');
//        $addpro=$this->Search_model->add_projectformconf();
        $output = "";
        $result = $this->Search_model->myprojectofconf($ididid);
        $addinconf = $this->Search_model->addinconfproject($ididid);
        $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                    <tr>
                     <th width="5%">ID</th>
                     <th width="15%">First Name</th>
                     <th width="15%">Last Name</th>
                     <th width="40%">Project Name</th>
                     <td width="5%"></td>
                     <td width="5%"></td>
                </tr>';
        $output .= '<tr>  <td></td>
                <td colspan="3"> <div class="input-group">
  <select class="custom-select" id="inputGroupSelect04" >';
        foreach ($addinconf as $ap) {
            $output .= '  <option data-id0="' . $ap["idproject"] . '"value="' . $ap["idproject"] . '">' . $ap["first_name"] . ' ' . $ap["last_name"] . ' :  ' . $ap["project_name"] . '</option>';
        };
        $output .= '  </select></div></td>
                   <td colspan="2"><button type="button" name="btn_add"  id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr> ';
        if ($result !== 0) {
            foreach ($result as $row) {
                $output .= '
                <tr';
                $backgroundcolor = "";
                if ($row["status"] == 0) {
                    $backgroundcolor = "#97bbf4";
                } elseif ($row["status"] == 1) {
                    $backgroundcolor = "#c7ffb5";
                } elseif ($row["status"] == 2) {
                    $backgroundcolor = "#fdffba";
                } elseif ($row["status"] == 3) {
                    $backgroundcolor = "#ffebbc";
                } elseif ($row["status"] == 4) {
                    $backgroundcolor = "#d2afff";
                } else {
                    $backgroundcolor = "#ffa5a5";
                }
                $output .= ' style="background-color:' . $backgroundcolor . '" >
                     <td>' . $row["idproject"] . '</td>
                     <td class="first_name" data-id1="' . $row["idproject"] . '" >' . $row["first_name"] . '</td>
                     <td class="last_name" data-id2="' . $row["idproject"] . '" >' . $row["last_name"] . '</td>
                     <td class="last_name" data-id2="' . $row["idproject"] . '" >' . $row["project_name"] . '</td>
                      <td><form method="post" action="projectinfo">
                            <button name="info" type="submit" value="' . $row["idproject"] . '" class="btn btn-xs btn-info btn_info">Info</button>
                           </form></td>
                     <td><button type="button" name="delete_btn" data-id3="' . $row["idproject"] . '" class="btn btn-xs btn-danger btn_delete">x</button></td>
                </tr>';
            }
        } else {
            $output .= '<tr>
                          <td colspan="5">Data not Found</td>
                     </tr>';
        }
        $output .= '</table>
      </div>';
        echo $output;
    }

    public function deleteprojectformconf() {

        $idproject = $this->input->post('id');
        $this->Search_model->delete_projectformconf($idproject);
        echo 'Project Deleted from Conference';
    }

    public function delete_from_conf() {
        $idproject = $this->input->post('idprojfordelete');
        $this->Search_model->delete_projectformconf($idproject);
        redirect('Admin/projects');
    }

    public function projectinfo() {
        $idproject = $this->input->post('info');
        $datainfo = $this->Search_model->projectinfo($idproject);
        $dataofreviewers = $this->Search_model->reviewerofproject($idproject);
        $coautors = $this->Search_model->coautors($idproject);
        $feildconf = $this->Search_model->fieldformconforproj($idproject);
        $idconf = $feildconf[0]['idconference'];
        $data['idconfeee'] = $idconf;
        $revisors = $this->Search_model->listofrewincof($idconf);
        $data['rewersinf'] = $dataofreviewers;
        $data['rew'] = $revisors;
        $data['fieldpi'] = $feildconf;
        $data['coautor'] = $coautors;
        $data['projinfo'] = $datainfo;
        $data['controller'] = "Admin";

        $this->loadView($data, "main/admin_project_info.php");
    }

    public function addprojectformconf() {
        $idproject = $this->input->post('id');
        $this->Search_model->add_projectformconf($idproject);
        echo 'Project ADDED to Conference';
    }

    public function get_competence() {
        $idconference = $this->input->post('idconf');
        $idreviewer = $this->input->post('idreviewer');
        $mark = $this->Search_model->get_competenceofrew($idreviewer, $idconference);
        if (count($mark) > 0) {
            $listofmark = '';
            $listofmark .= '
            <table class="table"><thead> <tr>';
            foreach ($mark as $fi) {
                $listofmark .= ' <th scope="col-6"> &nbsp &nbsp' . $fi['competence_level'] . '</th>';
            }

            $listofmark .= '        </tr>
                </thead></table>';
            echo $listofmark;
        }
    }

    public function return_to_author() {
        $idproject = $this->input->post('idprojforreturn');
        $this->Search_model->ReturnToAutor($idproject);
        redirect('Admin/projects');
    }

    public function send_to_rewiers() {
        $date = $this->input->post('date_to_finish');
        $idproject = $this->input->post('idprojforsend');
        $idreviewer1 = $this->input->post('rewuer1');
        $this->Search_model->Send_to_review($idreviewer1, $idproject, $date);
        $idreviewer2 = $this->input->post('rewuer2');
        $this->Search_model->Send_to_review($idreviewer2, $idproject, $date);
        $this->Search_model->Send_to_reviewstatus($idproject);
        redirect('Admin/projects');
    }

    public function alowprojinconf() {
        $idproject = $this->input->post('idprojforadd');
        $this->Search_model->projinconffinal($idproject);
        redirect('Admin/projects');
    }

    public function re_send_to_rewiers() {
        $idproject = $this->input->post('idprojforsend');
//        $idreviewer1 = $this->input->post('rewuer1');
//        $this->Search_model->Send_to_review($idreviewer1, $idproject, $date);
//        $idreviewer2 = $this->input->post('rewuer2');
//        $this->Search_model->Send_to_review($idreviewer2, $idproject, $date);
        $this->Search_model->Send_to_reviewstatus($idproject);
        $this->Search_model->Status_in_review($idproject);
        redirect('Admin/projects');
    }

}
